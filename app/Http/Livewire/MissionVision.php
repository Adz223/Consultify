<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MissionVision extends Component
{
    public function render()
    {
        return view('livewire.mission-vision')->layout('layouts.web')->layoutData([
            'imageUrl' => "./webassests/images/missionvision.jpg",
            'heading' => "Mission Vision"
        ]);
    }
}
