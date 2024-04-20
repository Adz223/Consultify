<?php

namespace App\Http\Livewire\Dashboard\Consultant;

use App\Models\Consultant;
use App\Models\Service;
use Livewire\Component;

class Update extends Component
{
    public $services, $service, $consultant, $first_name, $last_name, $email;

    protected $rules = [
        "first_name" => "required",
        "last_name" => "required",
        "email" => "required|email",
        "service" => "required|exists:services,id"
    ];

    public function mount(Consultant $consultant){
        $this->services = Service::get();
        $this->consultant = $consultant;
        $this->first_name = $this->consultant->first_name;
        $this->last_name = $this->consultant->last_name;
        $this->email = $this->consultant->email;
        $this->service = $this->consultant->service_id;
    }

    public function updateConsultant(){
        $this->validate();
        $this->validateOnly('email', [
            'email' => "unique:consultants,email,{$this->consultant->id},id"
        ]);
        $this->consultant->first_name = $this->first_name;
        $this->consultant->last_name = $this->last_name;
        $this->consultant->email = $this->email;
        $this->consultant->service_id = $this->service;
        if($this->consultant->save()) return redirect()->route('admin.consultant');
        else $this->addError('name', 'Consultant not Updated');
    }

    public function render() {
        return view('livewire.dashboard.consultant.update');
    }
}
