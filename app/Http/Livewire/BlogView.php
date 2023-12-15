<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Livewire\Component;

class BlogView extends Component
{
    public array $blog=[];
    public string $time;
    public function mount($blog,$time){
        $this->blog=$blog;
        $this->time=$time;
    }

    public function render(){
        return view('livewire.blog-view', [
            'blog' => $this->blog,
            'time' => $this->time,
            'url' => env("BACKEND_URL","")
        ]);
    }
}
