<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminSubscribers extends Component
{

    public $showDiv = true;
    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getSubscribers';
        $token = session('token');

        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $subscribers = $raw_response->getBody()->getContents();
        return view('livewire.admin-subscribers',[
            'subscribers'=>json_decode($subscribers,true),
            'url'=>env("BACKEND_URL","")

        ]);
    }
}
