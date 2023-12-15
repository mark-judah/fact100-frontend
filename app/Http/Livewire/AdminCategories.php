<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AdminCategories extends Component
{
    public $showDiv = true;

    public function render()
    {
        {

            $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", ""), 'verify' => false]);
            $endpoint = 'getAllCategories';

            $raw_response = $guzzle->get($endpoint);
            $categories = $raw_response->getBody()->getContents();
            return view('livewire.admin-categories', [
                'categories' => json_decode($categories),
                'url' => env("BACKEND_URL","")

            ]);
        }
    }
}
