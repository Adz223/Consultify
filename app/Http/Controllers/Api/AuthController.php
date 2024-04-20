<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class AuthController extends Controller
{
    public function signup(Request $request) {
        $request->validate([
            'first_name' => "required|max:40",
            'last_name' => "required|max:40",
            'email' => "required|max:40|email|unique:customers",
            'password' => "required|min:8",
        ]);
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();
        return response()->json([
            'accessToken' => $customer->createToken('AccessToken')->plainTextToken,
            'customer' => $customer    
        ], 200);
    }
    
    public function login(Request $request) {
        $request->validate([
            'email' => "required|email|exists:customers",
            'password' => "required",
        ]);
        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) return response()->json([
            'message' => "email not exists"
        ], 422);
        if(auth('customer')->attempt(['email' => $request->email, 'password' => $request->password])){ 
            $customer = auth('customer')->user();
            return response()->json([
                'accessToken' => $customer->createToken('AccessToken')->plainTextToken,
                'customer' => $customer    
            ], 200);
        }
        return response()->json([
            'message' => "invalid credentials"
        ], 422);
    }
    
    public function loggedInUser (Request $request) {
        return $request->user();
    }
}
