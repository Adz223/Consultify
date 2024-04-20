<?php

namespace App\Http\Controllers;

use App\Traits\ZoomMeet;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    use ZoomMeet;
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function zoom(Request $request)
    {
        return $this->getZoomRefreshToken($request->code);
    }
}
