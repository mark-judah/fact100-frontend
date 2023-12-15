<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminPodcasts extends Component
{

    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'getAllPodcasts';
        $data = [
            'request_type' => 'all_podcasts_no_pagination',
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $podcasts = $raw_response->getBody()->getContents();
        return view('livewire.admin-podcasts', [
            'podcasts' => json_decode($podcasts, true),
            'url' => env("BACKEND_URL","")
        ]);
    }
}
