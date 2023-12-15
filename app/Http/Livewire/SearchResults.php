<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchResults extends Component
{
    public array $blog=[];

    public function mount($blog){
        $this->blog=$blog;
    }
    public function render()
    {
        return view('livewire.search-results', [
            'posts' => $this->blog,
            'url'=>env("BACKEND_URL","")

        ]);
    }
}
