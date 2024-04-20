<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email, $message;

    protected $rules = ["email" => "required|exists:users"];

    public function forgotPassword(){
        $message = "";
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if($status === Password::RESET_LINK_SENT) $message = __($status);
        else $this->addError('email', __($status));
    }

    public function render() {
        $data = ['msg' => $this->message];
        $this->message = "";
        return view('livewire.forgot-password', $data)->layout('layouts.auth');
    }
}
