<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class AdminBlogComments extends Component
{
    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getAllComments';
        $token = session('token');

        $raw_response = $guzzle->get($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        $comments = $raw_response->getBody()->getContents();
        return view('livewire.admin-blog-comments',[
            'comments'=>json_decode($comments,true),
            'url'=>env("BACKEND_URL","")

        ]);
    }

}
