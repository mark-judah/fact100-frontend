<?php

namespace App\Http\Livewire;

use Akaunting\Apexcharts\Charts;
use App\Models\Visitors;
use GuzzleHttp\Client;
use Livewire\Component;

class ViewsPerCategory extends Component
{


    public function render()
    {

        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint = 'getAllPosts';
        $data = [
            'request_type' => 'all_posts_admin',
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $all_posts = json_decode($raw_response->getBody()->getContents(), true);
        $categories = [];
        $category = '';
        $slug = '';
        $category_slug = '';
        foreach ($all_posts as $data) {
            $category = $data['category'];
            $slug = $data['slug'];
            $category_slug = "$category:" . "$slug";
            array_push($categories, $category_slug);
        }
        $visitorData = $this->getVisitorData();

        $urls = [];
        foreach ($visitorData as $data) {
            $array = explode('/', $data['url']);
            $array_rev = array_reverse($array);
            if($data->platform!='') {
                array_push($urls, $array_rev[0]);
            }
        }
        $popular_categories = [];
        foreach ($categories as $category_slug) {
            $array = explode(':', $category_slug);
            foreach ($urls as $slugs) {
                if ($slugs == $array[1]) {
                    array_push($popular_categories, $array[0]);
                }
            }
        }
        $appearances = array_count_values($popular_categories);
        $chart = new Charts();

        $chart->setType('pie')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(array_keys($appearances));

        $chart->setSeries(array_values($appearances));
        return view('livewire.views-per-category', [
            'chart' => $chart
        ]);
    }

    private function getVisitorData()
    {
        $visitorData = Visitors::orderBy('created_at', 'desc')->get();
        return $visitorData;
    }
}
