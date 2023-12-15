<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   public function getAuthor($author){
       $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
       $endpoint = 'getPostsByAuthor';
       $data = [
           'author' => $author
       ];
       $raw_response = $guzzle->post($endpoint, [
           'form_params' => $data,
       ]);
       $response = $raw_response->getBody()->getContents();
       return view('templates.author', ['author' => json_decode($response, true)]);
   }

}
