<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounterComponent extends Component
{
    public $count = 0;

    public function mount(): void
    {
        $this->updateCartCount();
    }

    #[On('update-cart')]
    public function updateCartCount(): void
    {
        $this->count = Cart::getTotalQuantity();
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cart-counter-component');
    }
}
