<?php

namespace App\Http\Livewire\Dashboard\Consultant;

use App\Models\Consultant;
use App\Models\Service;
use Livewire\Component;

class Create extends Component
{
    public $services, $service, $first_name, $last_name, $email, $password, $password_confirmation;

    protected $rules = [
        "first_name" => "required|max:200",
        "last_name" => "required|max:200",
        "email" => "required|email|unique:consultants|max:200",
        "password" => "required|min:8|max:40|confirmed",
        "service" => "required|exists:services,id"
    ];

    public function mount() {
        $this->services = Service::get();
    }

    public function addConsultant(){
        $this->validate();
        $consultant = new Consultant;
        $consultant->first_name = $this->first_name;
        $consultant->last_name = $this->last_name;
        $consultant->email = $this->email;
        $consultant->password = bcrypt($this->password);
        $consultant->service_id = $this->service;
        if($consultant->save()) return redirect()->route('admin.consultant');
        else $this->addError('name', 'Consultant not Added');
    }

    public function render() {
        return view('livewire.dashboard.consultant.create');
    }
}
