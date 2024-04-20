<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class NavbarServiceDropDown extends Component
{
    public function render() {
        // dd(1);
        return view('livewire.navbar-service-drop-down', ['services' => $this->getData()]);
    }

    public function getData(){
        // dd(Service::all());
        return Service::all();
    }
}
