<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;

class Update extends Component
{
    public $user, $name, $email;

    protected $rules = [
        "name" => "required",
        "email" => "required|email"
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateUser(){
        $this->validate();
        $this->validateOnly('email', [
            'email' => "unique:users,email,{$this->user->id},id"
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if($this->user->save()) return redirect()->route('admin.user');
        else $this->addError('name', 'User not Updated');
    }

    public function render() {
        return view('livewire.dashboard.user.update');
    }
}
