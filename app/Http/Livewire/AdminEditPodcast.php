<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminEditPodcast extends Component
{
    public $showDiv = true;

    public function render()
    {
        return view('livewire.admin-edit-podcast',[
            'url' => env("BACKEND_URL","")
        ]);
    }
}
