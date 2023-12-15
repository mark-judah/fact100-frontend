<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class CategoryView extends Component
{
    public array $posts = [];

    public $category;

    public function mount($category,$posts)
    {
        $this->category = $category;
        $this->posts=$posts;
    }

    public function render()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
        $endpoint = 'getCategoryDescription';
        $data = [
            'category' => $this->category,
        ];
        $token = session('token');

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $result = json_decode($raw_response->getBody()->getContents(), true);

        return view('livewire.category-view', [
                'posts' => $this->posts,
                'url' => env("BACKEND_URL", ""),
                'description' => $result]
        );
    }
}
