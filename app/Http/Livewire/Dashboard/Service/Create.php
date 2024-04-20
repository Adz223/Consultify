<?php

namespace App\Http\Livewire\Dashboard\Service;

use App\Models\{ Service, ServiceCategory };
use Livewire\Component;

class Create extends Component
{
    public $serviceCategories, $serviceCategory, $name, $price, $eur_price, $mad_price, $description;

    protected $rules = [
        "name" => "required|unique:services",
        "price" => "required|numeric",
        "eur_price" => "required|numeric",
        "mad_price" => "required|numeric",
        "description" => "required|max:3000",
    ];

    public function mount(){
        $this->serviceCategories = ServiceCategory::all();
        $this->serviceCategory = $this->serviceCategories->value('id');
    }

    public function addService(){
        $this->validate();
        $service = new Service;
        $service->service_category_id = $this->serviceCategory;
        $service->name = $this->name;
        $service->price = $this->price;
        $service->eur_price = $this->eur_price;
        $service->mad_price = $this->mad_price;
        $service->description = $this->description;
        $service->is_active = true;
        if($service->save()) return redirect()->route('admin.service');
        else $this->addError('name', 'Service not Added');
    }

    public function render()
    {
        return view('livewire.dashboard.service.create');
    }
}
