<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Blogs extends Component
{
    public array $posts=[];
    public $pages;
    public function mount($posts,$pages){
        $this->blog=$posts;
        $this->pages=$pages;
    }

    public function render()
    {
        if(empty($this->posts)){
            $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
            $endpoint ='getAllPosts';
            //$token ='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTIyOjgwODBcL2FwaVwvbG9naW4iLCJpYXQiOjE2NDk2MjAyMjIsImV4cCI6MTY0OTYyMzgyMiwibmJmIjoxNjQ5NjIwMjIyLCJqdGkiOiJjUmJ1blR6QWUwMGZ0SDhxIiwic3ViIjoiOWNhMWVjNTAtNjJjOC00NzI1LWE1ODEtOTA0Nzk5YjA1OWZlIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.FFdo6rz7B6kzpg8DXMvxNKyYgqt14NjWuNr96WOEDzM';
            $data =[
                'request_type' => 'all_posts',
                "paginate"=>"12"
            ];
            $raw_response = $guzzle->post($endpoint, [
                // 'headers' => [ 'Authorization' => 'Bearer ' . $token ],
                'form_params' => $data,
            ]);
            $result = $raw_response->getBody()->getContents();
            return view('livewire.blogs', [
                'posts1' => json_decode($result,true),
                'posts_paginate' => json_decode($result),
                'url'=>env("BACKEND_URL","")
            ]);
        }else{
            return view('livewire.blogs', [
                'posts2' => $this->posts,
                'pages' => $this->pages,
                'url'=>env("BACKEND_URL","")
            ]);
        }
    }
}
