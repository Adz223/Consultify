<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = "simple-bootstrap";

    public function render() {
        return view('livewire.services', ['services' => $this->getData()])->layout('layouts.web')->layoutData([
            'imageUrl' => "../web2assets/images/Services.jpeg",
            'heading' => "Services"
        ]);
    }

    public function getData(){
        return Service::active()->paginate(6);
    }
}
