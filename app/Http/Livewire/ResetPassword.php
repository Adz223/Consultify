<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPassword extends Component
{
    public $token, $email, $password, $password_confirmation;

    protected $rules = [
        'password' => 'required|min:8|confirmed'
    ];

    public function mount($token){
        $this->token = $token;
    }

    public function resetPassword(){

        $status = Password::reset([
            'email' => $this->email, 'password' => $this->password,
            'password_confirmation' => $this->password_confirmation, 'token' => $this->token
        ], function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($this->password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        if($status === Password::PASSWORD_RESET) return redirect()->route('login')->with('status', __($status));
        else $this->addError('email', __($status));
    }

    public function render() {
        return view('livewire.reset-password')->layout('layouts.auth');
    }
}
