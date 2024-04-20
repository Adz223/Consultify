<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Settings extends Component
{
    public $tab, $name, $email, $password, $password_confirmation;

    protected $rules = [
        "name" => "required",
        "email" => "required|email|unique:users",
        "password" => "required|min:8|confirmed",
    ];

    public function mount()
    {
        $this->tab = request()->tab=="contact-detail" ? "contact-detail" : "profile-update";
    }

    public function addUser()
    {
        $this->validate();
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        if ($user->save()) {
            return redirect()->route('admin.user');
        } else {
            $this->addError('name', 'User not Added');
        }

    }

    public function render()
    {
        return view('livewire.dashboard.settings');
    }
}
