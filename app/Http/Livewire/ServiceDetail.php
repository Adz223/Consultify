<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceDetail extends Component
{
    use WithPagination;
    protected $service, $services;

    public function mount(Service $service){
        $this->service = $service;
        $this->services = Service::latest()->where('id', '!=', $service->id)->paginate(3);
    }

    public function render() {
        return view('livewire.service-detail', [
            'service' => $this->service,
            'services' => $this->services,
        ])->layout('layouts.web')->layoutData([
            'imageUrl' => "../web2assets/images/Services.jpeg",
            'heading' => "Services"
        ]);
    }
}
