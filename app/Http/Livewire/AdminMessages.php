<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminMessages extends Component
{

    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getMessages';
        $token = session('token');

        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $messages = $raw_response->getBody()->getContents();
        return view('livewire.admin-messages',[
            'messages'=>json_decode($messages,true),
            'url'=>env("BACKEND_URL","")

        ]);
    }
}
