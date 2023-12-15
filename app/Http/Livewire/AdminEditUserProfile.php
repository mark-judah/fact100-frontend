<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminEditUserProfile extends Component
{
    public $showDiv = true;

    public function render()
    {
        return view('livewire.admin-edit-user-profile',[
            'url' => env("BACKEND_URL","")
        ]);
    }
}
