<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function login(){
        $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->route('admin.home');
        }
        if(auth('consultant')->attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->route('admin.booking');
        }
        else $this->addError('email', 'Invalid Credentials');
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.auth');
    }
}
