<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminNewPodcast extends Component
{
    public $showDiv = true;

    public function render()
    {
        return view('livewire.admin-new-podcast',[
            'url' => env("BACKEND_URL","")
        ]);
    }
}
