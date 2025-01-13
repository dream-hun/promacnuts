<?php

use App\Http\Controllers\CheckOutController;
use App\Livewire\CartComponent;
use App\Livewire\ContactComponent;
use App\Livewire\ShoppingComponent;
use App\Livewire\WelcomeComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeComponent::class)->name('welcome');
Route::get('shop', ShoppingComponent::class)->name('shop');
Route::get('contact', ContactComponent::class)->name('contact');
Route::get('/shopping-basket', CartComponent::class)->name('cart');

Route::get('check-out', [CheckOutController::class, 'index'])->name('checkout');
Route::post('confirm', [CheckOutController::class, 'order'])->name('checkout.store');
Route::get('orders/{order}', [CheckOutController::class, 'show'])->name('orders.show');
