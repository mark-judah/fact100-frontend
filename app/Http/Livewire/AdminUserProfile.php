<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminUserProfile extends Component
{
    public $showDiv = true;
    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getProfiles';
        $token = session('token');

        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $profiles = $raw_response->getBody()->getContents();
        return view('livewire.admin-user-profile',[
            'profiles'=>json_decode($profiles,true),
            'url'=>env("BACKEND_URL","")
        ]);
    }
}
