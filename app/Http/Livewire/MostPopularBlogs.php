<?php

namespace App\Http\Livewire;

use Akaunting\Apexcharts\Charts;
use App\Models\Visitors;
use GuzzleHttp\Client;
use Livewire\Component;

class MostPopularBlogs extends Component
{


    public function render()
    {

        $visitorData= $this->getVisitorData();

        $urls=[];
        foreach ($visitorData as $data) {
            $array = explode('/', $data['url']);
            $array_rev = array_reverse($array);
            if($data->platform!='') {
                array_push($urls, $array_rev[0]);
            }
        }

        $appearances=array_count_values($urls);
        $chart = new Charts();

        $chart->setType('donut')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(array_keys($appearances));


        $chart->setDataset('Popular blogs','donut',array_values($appearances));
        return view('livewire.most-popular-blogs',[
            'chart'=>$chart
        ]);
    }

    private function getVisitorData()
    {
        $visitorData = Visitors::select('url', 'visitor_id','platform')->groupBy(['visitor_id', 'url','platform'])->get();
        return $visitorData;
    }
}
