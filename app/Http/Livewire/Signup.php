<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consultant;
use App\Models\Service;

class Signup extends Component
{
    public $services, $service, $first_name, $last_name, $email, $password, $password_confirmation;

    protected $rules = [
        "first_name" => "required|max:200",
        "last_name" => "required|max:200",
        "email" => "required|email|unique:consultants|max:200",
        "password" => "required|min:8|max:40|confirmed",
        "service" => "required|exists:services,id"
    ];

    public function signup(){
        $this->validate();
        $consultant = new Consultant;
        $consultant->first_name = $this->first_name;
        $consultant->last_name = $this->last_name;
        $consultant->email = $this->email;
        $consultant->password = bcrypt($this->password);
        $consultant->service_id = $this->service;
        $consultant->save();
        \Auth::guard('consultant')->loginUsingId($consultant->id);
        return redirect()->route('admin.booking');
    }
    

    public function mount() {
        $this->services = Service::get();
    }

    public function render()
    {
        return view('livewire.signup')->layout('layouts.auth');
    }
}
