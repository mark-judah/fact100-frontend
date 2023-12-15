<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class NavBar extends Component
{

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getPostsAndCategories';
        $raw_response = $guzzle->post($endpoint);
        $data = json_decode($raw_response->getBody()->getContents(),true);

        return view('livewire.nav-bar', [
            'posts' => $data['posts'],
            'categories'=>$data['categories']
        ]);
    }
}
