<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Livewire\Component;

class Like extends Component
{


    public  function like(Request  $request){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'likeToggle';
//        $clientLocation=\Location::get($clientIp);

        $endpoint2 = "checkip.amazonaws.com";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint2);
        $statusCode = $response->getStatusCode();
        $ip = $response->getBody()->getContents();

        $useragent=$request->userAgent();
        $visitor_id="$ip"."_"."$useragent";
        $data = [
            'liked_by' => $visitor_id,
            'blog_slug' => $request->headers->get('referer'),
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        $this->render();
    }

    public function render()
    {
        $array = explode('/',request()->headers->get('referer') );
        $array_rev = array_reverse($array);
        $slug= request()->url();

        if ($array_rev[0]!=''){
            $slug=request()->headers->get('referer');
        }
        if ( $array_rev[0]=='blogs'){
            $slug= request()->url();
        }
        if ( $array_rev[0]=='search'){
            $slug= request()->url();
        }
        if ( $array_rev[0]=='about-us'){
            $slug= request()->url();
        }
        if ( $array_rev[0]=='podcasts'){
            $slug= request()->url();
        }
        if ( $array_rev[0]=='contact-us'){
            $slug= request()->url();
        }
        if ( in_array("category",$array) || in_array("page",$array )|| in_array("author",$array )){
            $slug= request()->url();
        }
        if ( $array_rev[0]=='categories'){
            $slug= request()->url();
        }
        //dd($slug);
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'likeAvailable';
        $endpoint2 = "checkip.amazonaws.com";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint2);
        $statusCode = $response->getStatusCode();
        $ip = $response->getBody()->getContents();

        $useragent=\request()->userAgent();
        $visitor_id="$ip"."_"."$useragent";
        error_log($slug);
        $data = [
            'liked_by' => $visitor_id,
            'blog_slug' => $slug,
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $response = $raw_response->getBody()->getContents();
        return view('livewire.like',[
            'like_status' => json_decode($response,true),
        ]);
    }

}
