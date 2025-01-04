<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Shopping Cart - Promacnuts Ltd')]
class CartComponent extends Component
{
    use LivewireAlert;

    public function removeItem($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item) {
            Cart::remove($rowId);
            $this->dispatch('update-cart');
            $this->alert('success', $item->name.' has been removed from the cart.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function increaseQuantity($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item) {
            Cart::update($rowId, [
                'quantity' => 1,
            ]);
            $this->dispatch('update-cart');
            $this->alert('success', $item->name.' quantity has been increased.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function decreaseQuantity($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item && $item->quantity > 1) {
            Cart::update($rowId, [
                'quantity' => -1,
            ]);
            $this->dispatch('update-cart');
            $this->alert('success', $item->name.' quantity has been decreased.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        } elseif ($item && $item->quantity == 1) {
            $this->alert('warning', 'Quantity cannot be less than 1. Use remove button to delete the item.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        $cartItems = Cart::getContent();

        // Fetch product details including images
        $cartItemsWithImages = $cartItems->map(function ($item) {
            $product = Product::find($item->id);
            if ($product) {
                $imageUrl = $product->image;

                return array_merge($item->toArray(), ['image_url' => $imageUrl]);
            }

            return $item;
        });

        return view('livewire.cart-component', ['cartItems' => $cartItemsWithImages, 'cart' => $cartItems]);
    }
}
