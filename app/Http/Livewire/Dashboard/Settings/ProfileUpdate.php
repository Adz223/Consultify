<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Livewire\Component;

class ProfileUpdate extends Component
{
    public $user, $name, $email, $checkPassword, $oldPassword, $password, $password_confirmation;
    public $profileMessage, $pwdMessage;

    public function mount(){
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateProfile(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'checkPassword' => 'required|current_password'
        ], [], [
            'name' => 'Name',
            'email' => 'Email',
            'checkPassword' => 'Password'
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();
        $this->checkPassword = "";
        $this->profileMessage = "Profile has been updated.";
    }

    public function updatePassword(){
        $this->validate([
            'oldPassword' => 'required|current_password',
            'password' => 'required|min:8|different:oldPassword|confirmed'
        ], [], [
            'oldPassword' => 'Current Password',
            'password' => 'Password'
        ]);
        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->oldPassword = "";
        $this->password = "";
        $this->password_confirmation = "";
        $this->pwdMessage = "Password has been updated.";
    }

    public function render() {
        $profileMsg = $this->profileMessage;
        $pwdMsg = $this->pwdMessage;
        $this->profileMessage = "";
        $this->pwdMessage = "";
        return view('livewire.dashboard.settings.profile-update', compact('profileMsg', 'pwdMsg'));
    }
}
