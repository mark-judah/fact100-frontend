<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use GuzzleHttp\Client;
use Livewire\Component;

class AdminDashboard extends Component
{
        public $showDiv = true;

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL",""),'verify' => false]);
        $endpoint ='statsCount';
        $token=session('token');
        $raw_response = $guzzle->post($endpoint, [
            'headers' => [ 'Authorization' => 'Bearer ' . $token ],
        ]);
        $stats = json_decode($raw_response->getBody()->getContents(),true);

        $columnChartModel =
            (new ColumnChartModel())
                ->setTitle('Expenses by Type')
                ->addColumn('Food', 100, '#f6ad55')
                ->addColumn('Shopping', 200, '#fc8181')
                ->addColumn('Travel', 300, '#90cdf4')
        ;
        return view('livewire.admin-dashboard',[
            'stats'=>$stats,
            'columnChartModel'=>$columnChartModel,
            'url' => env("BACKEND_URL","")

        ]);
    }
}
