<?php

namespace App\Http\Livewire;

use Akaunting\Apexcharts\Charts;
use GuzzleHttp\Client;
use Livewire\Component;

class MostLikedPosts extends Component
{

    public function render()
    {

        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='getAllLikes';
        $token=session('token');
        $data =[
            'request_type' => 'all_likes',
        ];
        $raw_response = $guzzle->post($endpoint, [
            'headers' => [ 'Authorization' => 'Bearer ' . $token ],
            'form_params' => $data,
        ]);
        $all_likes = json_decode($raw_response->getBody()->getContents(),true);

        $likes=[];
        foreach ($all_likes as $data) {
            $array = explode('/', $data['blog_slug']);
            $array_rev = array_reverse($array);
            array_push($likes,$array_rev[0]);
        }

        $appearances=array_count_values($likes);
        $chart = new Charts();

        $chart->setType('donut')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(array_keys($appearances));

        $chart->setDataset('Popular blogs','donut',array_values($appearances));
        return view('livewire.most-liked-posts',[
            'chart'=>$chart
        ]);
    }
}
