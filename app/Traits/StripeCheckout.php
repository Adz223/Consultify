<?php
namespace App\Traits;

use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Checkout\Session;

trait StripeCheckout
{
    public function checkout($order_id, $service_id, $servicename, $price, $currency = 'GBP', $successUrl = "", $cancelUrl = "")
    {

        if ($successUrl) {
            $query = parse_url($successUrl, PHP_URL_QUERY);
    
            // Returns a string if the URL has parameters or NULL if not
            if ($query) {
                $successUrl .= "&session_id={CHECKOUT_SESSION_ID}";
            } else {
                $successUrl .= "?session_id={CHECKOUT_SESSION_ID}";
            }
        }
        else $successUrl = route('stripe.success') . "?session_id={CHECKOUT_SESSION_ID}";

        if (!$cancelUrl) $cancelUrl = route('stripe.cancelled'). "?service_id=".$service_id; 

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $price = round($price * 100, 2);
        return Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'unit_amount' => $price,
                    'product_data' => [
                        'name' => $servicename,
                    ],
                ],
                'quantity' => 1,
            ]],
            'currency' => $currency,
            'mode' => 'payment',    
            'client_reference_id' => $order_id,
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl
        ]);
    }

    public function getSession($session_id)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        return $stripe->checkout->sessions->retrieve($session_id, []);
    }
}
