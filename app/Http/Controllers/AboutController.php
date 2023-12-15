<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function imgUpload(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'uploadAboutUsImage';
        $token = session('token');
        $data = [
            'multipart' => [
                'name' => 'about_us_image',
                'contents' => file_get_contents($request->file('file')->getPathname()),
                'filename' => date('YmdHis') . "." . $request->file('file')->getClientOriginalExtension(),
            ]
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'multipart' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return $response;
        dd(json_decode($response));
    }

    public function editAbout(Request $request)
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL","")]);
        $endpoint = 'editAboutUs';
        $token = session('token');
        $data = [
            'id'=>$request->about_id,
            'content_body'=>$request->about_content
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $statusCode = $raw_response->getStatusCode();

        if($statusCode==201) {
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect('/admin-edit-about');
        }
    }

}
