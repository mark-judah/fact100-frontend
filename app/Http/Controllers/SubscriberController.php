<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{


    public function subscribe(Request $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'createSubscriber';

        $data = [
            'email' => $request->get('email')
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
            session()->flash('message', $result['result']);
            return redirect($request->headers->get('referer'));
        }
   }

    public function UnSubscribe(Request $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'deleteSubscriber';
        $token = session('token');

        $data = [
            'email' => $request->get('email')
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $statusCode = $raw_response->getStatusCode();

        if($statusCode==204) {
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect($request->headers->get('referer'));
        }     }
}
