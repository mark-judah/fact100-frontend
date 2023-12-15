<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function makeComment(Request $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'createComment';
        $data = [
            'post_id' => $request->input('post_id'),
            'slug' => $request->input('slug'),
            'comment' => $request->input('comment'),
            'comment_by' => $request->input('comment_by'),
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return redirect( $request->headers->get('referer'));

    }
}
