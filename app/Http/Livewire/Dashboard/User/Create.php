<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        "name" => "required",
        "email" => "required|email|unique:users",
        "password" => "required|min:8|confirmed",
    ];

    public function addUser(){
        $this->validate();
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        if($user->save()) return redirect()->route('admin.user');
        else $this->addError('name', 'User not Added');
    }

    public function render() {
        return view('livewire.dashboard.user.create');
    }
}
