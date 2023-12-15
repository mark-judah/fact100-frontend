<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Podcasts extends Component
{


    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'getAllPodcasts';
        $data = [
            'request_type' => 'all_podcasts',
            "paginate" => "9"
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $podcast = $raw_response->getBody()->getContents();
        return view('livewire.podcasts', [
            'podcast' => json_decode($podcast, true),
            'url' => env("BACKEND_URL","")
        ]);
    }
}
