<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class About extends Component
{


    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'getAboutUs';
        $raw_response = $guzzle->get($endpoint);
        $about = $raw_response->getBody()->getContents();
        return view('livewire.about', [
            'about' => json_decode($about),
        ]);
    }
}
