<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Consultant as ConsultantModel;
use Livewire\Component;
use Livewire\WithPagination;

class Consultant extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;

    public function render(){
        return view('livewire.dashboard.consultant', ['consultants' => $this->getData()]);
    }

    public function getData(){
        return ConsultantModel::has('service')->with('service')->search($this->search)
            ->orderBy('id', 'desc')
            ->paginate($this->pageLimit);
    }

    public function deleteConsultant($consultantId){
        ConsultantModel::where('id', $consultantId)->delete();
    }
}
