<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use LivewireUI\Modal\ModalComponent;

class AdminCategoryDescriptionModal extends ModalComponent
{
    public $textarea_content;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function editDescription(){
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
        $endpoint = 'editCategoryDescription';
        $data = [
            'category' => $this->category,
            'new_description'=>$this->textarea_content
        ];
        $token = session('token');

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $this->render();

    }

    public function render()
    {
        //get all the blogs with the category that is to be deleted
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
        $result = json_decode($raw_response->getBody()->getContents(),true);

        return view('livewire.admin-category-description-modal', [
                'description' => $result]
        );
    }


}
