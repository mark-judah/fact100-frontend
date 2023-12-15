<?php

namespace App\Http\Controllers;

use App\Http\Livewire\AdminEditCategoryModal;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function newCategory(Request $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'http_errors' => false]);
        $endpoint = 'createCategory';
        $token = session('token');

        $data = [
            'category' => $request->get('category'),
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $statusCode = $raw_response->getStatusCode();
        if($statusCode==201) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('message', $result['result']);
            return redirect($request->headers->get('referer'));
        }
        if($statusCode==403) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('error', $result['result']);
            return redirect($request->headers->get('referer'));
        }
        if($statusCode==422) {
            $response = $raw_response->getBody()->getContents();
            $result=json_decode($response, true);
            session()->flash('error', 'Category already exists');
            return redirect($request->headers->get('referer'));
        }
        return redirect( $request->headers->get('referer'));
    }

    public function editModalCategory(Request $request)
    {
        return redirect($request->headers->get('referer'));
    }
}
