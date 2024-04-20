<?php
namespace App\Traits;

use App\Models\ZoomAccess;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

trait ZoomMeet
{
    public $headers, $redirect_uri;
    public $zoomLink, $userInfo, $codeVerifier;
    public $auth_url = "https://zoom.us/oauth/token";

    public function setZoomConfig() {
        $clientId = env('ZOOM_CLIENT_ID');
        $secretKey = env('ZOOM_KEY');
        $zoomKey = base64_encode($clientId.":".$secretKey);
        $this->redirect_uri = route('zoom.redirect');
        $this->codeVerifier = rand();
        $this->zoomLink = "https://zoom.us/oauth/authorize?response_type=code&client_id={$clientId}&redirect_uri={$this->redirect_uri}";
        $this->headers = [
            'Authorization' => "Basic {$zoomKey}",
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function getUserInfo()
    {
        try {
            $accessToken = $this->getZoomAccessToken();
            if (!$accessToken) {
                return;
            }

            $headers = [
                "Authorization" => "Bearer " . $accessToken,
            ];
            $client = new Client();
            $request = new Request('GET', "https://api.zoom.us/v2/users/me", $headers);
            $res = $client->sendAsync($request)->wait();

            $this->userInfo = json_decode($res->getBody(), true);
        } catch (Throwable $th) {
            return;
        }

    }

    public function getZoomRefreshToken($authorizationCode)
    {
        try {
            $this->setZoomConfig();    
            $client = new Client();
            $options = [
                'form_params' => [
                    'code' => $authorizationCode,
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => $this->redirect_uri,
                ],
            ];
            $request = new Request('POST', $this->auth_url, $this->headers);
            $res = $client->sendAsync($request, $options)->wait();
            $refresh_token = json_decode($res->getBody());
            $this->saveAccessToken($refresh_token);
            return redirect()->route('admin.profileUpdate', ['tab' => 'contact-detail'])->with('success', 'Zoom has been Linked');
        } catch (Throwable $th) {
            dd($th);
            return redirect()->route('admin.profileUpdate', ['tab' => 'contact-detail'])->with('error', $th->getMessage());
        }
    }

    public function getZoomAccessToken($refreshToken = "")
    {
        try {
            if (!$refreshToken) {
                $now = now();
                $zoomAccessToken = ZoomAccess::first();
                if ($zoomAccessToken) {
                    if ($now->diffInMinutes(Carbon::parse($zoomAccessToken->access_token_expiry), false) > 1) {
                        return $zoomAccessToken->access_token;
                    }
                    $refresh_token = $zoomAccessToken->refresh_token;
                } else {
                    return false;
                }
            }
            $this->setZoomConfig();
            $client = new Client();
            $options = [
                'form_params' => [
                    'refresh_token' => $refresh_token,
                    'grant_type' => 'refresh_token',
                ],
            ];
            $request = new Request('POST', $this->auth_url, $this->headers);
            $res = $client->sendAsync($request, $options)->wait();
            $refresh_token = json_decode($res->getBody());
            $this->saveAccessToken($refresh_token);
            return $refresh_token->access_token;
        } catch (Throwable $th) {
            return;
        }
    }

    public function saveAccessToken($accessTokenData)
    {
        $zoomAccessToken = ZoomAccess::first();
        if (!$zoomAccessToken) {
            $zoomAccessToken = new ZoomAccess;
        }
        $time = now()->addSeconds($accessTokenData->expires_in)->format("Y-m-d h:i:s");
        $zoomAccessToken->access_token = $accessTokenData->access_token;
        $zoomAccessToken->refresh_token = $accessTokenData->refresh_token;
        $zoomAccessToken->refresh_token_expiry = $time;
        $zoomAccessToken->access_token_expiry = $time;
        $zoomAccessToken->save();
    }

    public function meeting($title, $email, $contact_email, $meetingTime = 30)
    {
        try {
            $accessToken = $this->getZoomAccessToken();
            if (!$accessToken) {
                return ['status' => false, 'error' => "Zoom has been disconnected."];
            }
            $this->setZoomConfig();
            $body = json_encode([
                "agenda" => $title,
                "default_password" => false,
                "duration" => $meetingTime,
                "password" => str()->random(8),
                "pre_schedule" => false,
                "settings" => [
                    // "authentication_option" => "signIn_D8cJuqWVQ623CI4Q8yQK0Q",
                    "contact_email" => $contact_email,
                    "email_notification" => true,
                    "encryption_type" => "enhanced_encryption",
                    "meeting_authentication" => true,
                    "meeting_invitees" => [
                        [
                            "email" => $email,
                        ],
                    ],
                    "waiting_room" => true,
                ],
                "topic" => $title,
                "type" => 2,
            ]);
            $headers = [
                "Authorization" => "Bearer " . $accessToken,
            ];
            $url = "https://api.zoom.us/v2/users/me/meetings";
            $res = Http::withHeaders($headers)->withBody($body, "application/json")->post($url);
            $body = json_decode($res->getBody(), true);
            if (isset($body['code']) && $body['code'] != 200) {
                return ['status' => false, 'error' => $body['message']];
            }

            return ['status' => true, 'data' => $body];
        } catch (Throwable $th) {
            return ['status' => false, 'error' => $th->getMessage()];
        }
    }
}
