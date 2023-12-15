<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use LivewireUI\Modal\ModalComponent;

class AdminEditCategoryModal extends ModalComponent
{
    public $category;
    public $selected_category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        //get all the blogs with the category that is to be deleted
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
        $endpoint = 'getPostsByCategory';
        $data = [
            'request_type' => 'all_posts',
            'category' => $this->category,
        ];
        $raw_response = $guzzle->post($endpoint, [
            'form_params' => $data,
        ]);
        $result = json_decode($raw_response->getBody()->getContents(), true);

        return view('livewire.admin-edit-category-modal', [
            'posts' => $result['posts'],
            'categories' => $result['categories'],
            'current_category'=>$this->category,
            'url' => env("BACKEND_URL", "")
        ]);
    }

    public function changeCategory($postId)
    {
        if ($this->selected_category != null) {
            $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
            $endpoint = 'changePostCategory';
            $data = [
                'postId' => $postId,
                'new_category' => $this->selected_category,

            ];
            $token = session('token');

            $raw_response = $guzzle->post($endpoint, [
                'headers' => ['Authorization' => 'Bearer ' . $token],
                'form_params' => $data,
            ]);
            $result = json_decode($raw_response->getBody()->getContents(), true);
            $statusCode = $raw_response->getStatusCode();
            if ($statusCode == 201) {
                session()->flash('message', $result['result']);
                $this->render();
            }
        } else {
            session()->flash('message', 'Please choose a new category first!');
        }
    }

    public function deleteCategory()
    {
        $guzzle = new Client(['base_uri' => env("BACKEND_API_URL", "")]);
        $endpoint = 'deleteCategory';
        $data = [
            'old_category' => $this->category,
        ];
        $token = session('token');

        $raw_response = $guzzle->post($endpoint, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => $data,
        ]);
        $result = json_decode($raw_response->getBody()->getContents(), true);
        $statusCode = $raw_response->getStatusCode();
        if ($statusCode == 201) {
            session()->flash('message', $result['result']);
            $this->redirect('/admin-categories');
        }
    }
}
