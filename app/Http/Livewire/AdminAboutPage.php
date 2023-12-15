<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminAboutPage extends Component
{
    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", ""), 'verify' => false]);
        $endpoint = 'getAboutUs';

        $raw_response = $guzzle->get($endpoint);
        $about = $raw_response->getBody()->getContents();
        return view('livewire.admin-about-page', [
            'about' => json_decode($about, true),
            'url' => env("BACKEND_URL", "")
        ]);
    }

}
