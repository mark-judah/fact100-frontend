<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    public function contactUs(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'createMessage';
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $statusCode = $raw_response->getStatusCode();

        if($statusCode==201) {
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect($request->headers->get('referer'));
        }
        if($statusCode==403) {
            $result=json_decode($response, true);
            session()->flash('error', $result['result']);
            return redirect($request->headers->get('referer'));
        }
    }
}
