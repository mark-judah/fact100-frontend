<?php

namespace App\Http\Livewire;

use Akaunting\Apexcharts\Charts;
use App\Models\Visitors;
use GuzzleHttp\Client;
use ipinfo\ipinfo\IPinfo;
use Khill\Lavacharts\Lavacharts;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class ReadersLocationChart extends Component
{
    public $countries=[];


    public function render()
    {
        $visitorData = $this->getVisitorData();
        $access_token = env('IPINFO_SECRET');
        $client = new IPinfo($access_token);


        foreach($visitorData as $data){
            if($data->ip_location==null){
                $this->getIP($data,$client);
            }
            if($data->ip_location!=null) {
                if ($data->platform != '') {
                    array_push($this->countries, $data->ip_location);
                }
            }
        }

        $appearances = array_count_values($this->countries);
        $chart = new Charts();

        $chart->setType('pie')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(array_keys($appearances));

        $chart->setSeries(array_values($appearances));
        return view('livewire.readers-location-chart', [
            'chart' => $chart
        ]);
    }

        private function getVisitorData()
        {
            $visitorData = Visitors::orderBy('created_at', 'desc')->get(['ip','ip_location','platform']);
            return $visitorData;
        }

        private function getIP($data,$client)
        {
            $details = $client->getDetails($data->ip);
            if($data->platform!=''){
                array_push($this->countries,$details->country_name);

            }
            Visitors::where("ip",$data->ip)->update([
            'ip_location' => $details->country_name,
        ]);
        }
}
