<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact us - Promacnuts Ltd')]
class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.contact-component');
    }
}
