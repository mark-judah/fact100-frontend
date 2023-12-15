<?php

namespace App\Http\Livewire;

use App\Models\Visitors;
use GuzzleHttp\Client;
use Livewire\Component;

class AdminPosts extends Component
{

    public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", ""), 'verify' => false]);
        $endpoint = 'getAllPosts';
        $data = [
            'request_type' => 'all_posts_admin',
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $posts = $raw_response->getBody()->getContents();

        $visitorData = $this->getVisitorData();

        $urls = [];
        foreach ($visitorData as $data) {
            $array = explode('/', $data['url']);
            $array_rev = array_reverse($array);
            if($data->platform!='') {
                array_push($urls, $array_rev[0]);
            }
        }
        return view('livewire.admin-posts', [
            'posts' => json_decode($posts, true),
            'visited_urls'=>$urls,
            'url' => env("BACKEND_URL", "")
        ]);
    }

    private function getVisitorData()
    {
        $visitorData = Visitors::select('url', 'visitor_id','platform')->groupBy(['visitor_id', 'url','platform'])->get();
        return $visitorData;
    }
}
