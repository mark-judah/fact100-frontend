<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class HomeBlogs extends Component
{

    public function render()
    {
        $cached_posts=Cache::get('home_blogs');
        if ($cached_posts){
            return view('livewire.home-blogs', [
                'posts' => json_decode($cached_posts,true),
                'url'=>env("BACKEND_URL","")
            ]);
        }else{
            $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
            $endpoint ='getAllPosts';
            //$token ='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTIyOjgwODBcL2FwaVwvbG9naW4iLCJpYXQiOjE2NDk2MjAyMjIsImV4cCI6MTY0OTYyMzgyMiwibmJmIjoxNjQ5NjIwMjIyLCJqdGkiOiJjUmJ1blR6QWUwMGZ0SDhxIiwic3ViIjoiOWNhMWVjNTAtNjJjOC00NzI1LWE1ODEtOTA0Nzk5YjA1OWZlIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.FFdo6rz7B6kzpg8DXMvxNKyYgqt14NjWuNr96WOEDzM';
            $data =[
                'request_type' => 'home_posts',
            ];
            $raw_response = $guzzle->post($endpoint, [
                // 'headers' => [ 'Authorization' => 'Bearer ' . $token ],
                'form_params' => $data,
            ]);
            $result = $raw_response->getBody()->getContents();
            Cache::put('home_blogs', $result, 300);

            return view('livewire.home-blogs', [
                'posts' => json_decode($result,true),
                'url'=>env("BACKEND_URL","")
            ]);
        }

    }
}
