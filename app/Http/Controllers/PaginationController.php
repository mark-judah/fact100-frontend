<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaginationController extends Controller
{


    public function paginateBlogs($label)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'getAllPosts';
        //$token ='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjAuMTIyOjgwODBcL2FwaVwvbG9naW4iLCJpYXQiOjE2NDk2MjAyMjIsImV4cCI6MTY0OTYyMzgyMiwibmJmIjoxNjQ5NjIwMjIyLCJqdGkiOiJjUmJ1blR6QWUwMGZ0SDhxIiwic3ViIjoiOWNhMWVjNTAtNjJjOC00NzI1LWE1ODEtOTA0Nzk5YjA1OWZlIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.FFdo6rz7B6kzpg8DXMvxNKyYgqt14NjWuNr96WOEDzM';
        $data = [
            'request_type' => 'all_posts_no_pagination',
            "cache"=>'no_cache'
        ];
        $raw_response = $guzzle->post($endpoint, [
            // 'headers' => [ 'Authorization' => 'Bearer ' . $token ],
            'form_params' => $data,
        ]);
        $posts = json_decode($raw_response->getBody()->getContents(), true);
        $pagination = 12;
        $pages = ceil(count($posts)/$pagination);
        $upper_limit = $label * $pagination;
        $lower_limit = $upper_limit - $pagination;
        $sliced_posts = array_slice($posts, $lower_limit,$pagination);
        return view('templates.blogs', [
            'posts' => $sliced_posts,
            'pages' => $pages
        ]);


    }


    public function paginatePodcasts($label)
    {
    }

    public function paginateAdminBlogs($label)
    {
    }
}
