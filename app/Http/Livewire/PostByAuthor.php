<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class PostByAuthor extends Component
{
    public array $author=[];

    public function mount($author){
        $this->author=$author;
    }
    public function render()
    {
        return view('livewire.post-by-author', [
            'author' => $this->author,
            'url'=>env("BACKEND_URL","")

        ]);
    }
}
