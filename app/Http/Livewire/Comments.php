<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Comments extends Component
{

    public array $blog=[];

    public function mount($blog){
        $this->blog=$blog;
    }

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'getComments';

        $data = [
            'slug' => \request()->url(),
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $comments = $raw_response->getBody()->getContents();
        return view('livewire.comments',[
        'blog' => $this->blog,
        'comments' => json_decode($comments,true),
        ]);
    }
}
