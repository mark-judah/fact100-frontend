<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class AddCategoryModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.add-category-modal');
    }
}
