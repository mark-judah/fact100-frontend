<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminNewPost extends Component
{
    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getAllCategories';
        $token = session('token');

        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $categories = $raw_response->getBody()->getContents();
        return view('livewire.admin-new-post',[
            'categories'=>json_decode($categories,true),
            'url' => env("BACKEND_URL","")
        ]);
    }
}
