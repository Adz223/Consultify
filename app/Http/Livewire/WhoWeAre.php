<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WhoWeAre extends Component
{
    public function render()
    {
        return view('livewire.who-we-are')->layout('layouts.web')->layoutData([
            'imageUrl' => "./web2assets/images/Who_we_are.png",
            'heading' => "Who We Are?"
        ]);
    }
}
