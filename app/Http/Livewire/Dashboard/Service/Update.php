<?php

namespace App\Http\Livewire\Dashboard\Service;

use Livewire\Component;
use App\Models\{ Service, ServiceCategory };

class Update extends Component
{
    public $service, $serviceCategories, $serviceCategory, $name, $price, $eur_price, $mad_price, $description, $is_active;

    protected $rules = [
        "name" => "required",
        "price" => "required|numeric",
        "eur_price" => "required|numeric",
        "mad_price" => "required|numeric",
        "description" => "required|max:1000",
    ];

    public function mount(Service $service){
        $this->serviceCategories = ServiceCategory::all();
        $this->service = $service;
        $this->name = $this->service->name;
        $this->price = $this->service->price;
        $this->eur_price = $this->service->eur_price;
        $this->mad_price = $this->service->mad_price;
        $this->is_active = $this->service->is_active;
        $this->description = $this->service->description;
        $this->serviceCategory = $this->service->service_category_id;
    }

    public function addService(){
        $this->validate();
        $this->validateOnly('name', [
            'name' => "unique:users,name,{$this->service->id},id"
        ]);
        $this->service->service_category_id = $this->serviceCategory;
        $this->service->name = $this->name;
        $this->service->price = $this->price;
        $this->service->eur_price = $this->eur_price;
        $this->service->mad_price = $this->mad_price;
        $this->service->description = $this->description;
        $this->service->is_active = $this->is_active;
        if($this->service->save()) return redirect()->route('admin.service');
        else $this->addError('name', 'Service not Updated');
    }

    public function render()
    {
        return view('livewire.dashboard.service.update');
    }
}
