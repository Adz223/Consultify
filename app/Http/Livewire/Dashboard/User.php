<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User as UserModel;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;

    public function render(){
        return view('livewire.dashboard.user', ['users' => $this->getData()]);
    }

    public function getData(){
        return UserModel::users()
            ->search($this->search)
            ->orderBy('id', 'desc')
            ->paginate($this->pageLimit);
    }

    public function deleteUser($userId){
        UserModel::where('id', $userId)->delete();
    }
}
