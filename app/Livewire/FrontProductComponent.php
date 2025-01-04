<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FrontProductComponent extends Component
{
    use LivewireAlert;

    public $product;

    public $quantity = 1;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    public function addToCart(): void
    {

        $item = Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'quantity' => $this->quantity,
            'price' => $this->product->price,
        ]);

        $item->associate(Product::class);

        $this->dispatch('update-cart');

        $this->alert('success', $this->product->name.' is added to cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function remove(): void
    {
        Cart::remove($this->product->id);
        $this->dispatch('update-cart');
        $this->alert('error', $this->product->name.' is remove from cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $latestProducts = Product::orderBy('created_at', 'DESC')->get();

        return view('livewire.front-product-component', [
            'products' => $latestProducts,
            'added' => Cart::get($this->product->id),
        ]);
    }
}
