<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service As ServiceModel;

class Service extends Component
{
    use WithPagination;

    public function render() {
        return view('livewire.service', ['services' => $this->getData()]);
    }

    public function getData(){
        return ServiceModel::active()->paginate(5);
    }
}
