<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        $cartItemsWithDetails = $cartItems->map(function ($item) {
            $product = Product::with('media')->find($item->id);
            if ($product) {
                return array_merge($item->toArray(), [
                    'image_url' => $product->getFirstMediaUrl('image', 'thumb'),
                    'measurement' => $product->measurement,
                ]);
            }

            return $item;
        })->filter(); // Remove null values

        return view('check-out', [
            'cartItems' => $cartItemsWithDetails,

            'subtotal' => Cart::getSubTotal(),
            'total' => Cart::getTotal(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'customer_address' => 'required|string|max:1000',
            'customer_note' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            // Validate cart items exist in products
            foreach (Cart::getContent() as $cartItem) {
                $product = Product::find($cartItem->id);
                if (! $product) {
                    throw new Exception('One or more products in your cart are no longer available.');
                }
            }

            // Create order
            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $validated['customer_address'],
                'customer_note' => $validated['customer_note'],
                'status' => OrderStatus::PENDING,
            ]);

            // Generate order number after creating order
            $order->generateOrderNumber();

            // Create order items
            foreach (Cart::getContent() as $cartItem) {
                $product = Product::find($cartItem->id);
                if ($product) {
                    $orderItem = $order->orderItems()->create([
                        'product_id' => $product->id,
                        'price' => $cartItem->price,
                        'quantity' => $cartItem->quantity,
                        'subtotal' => $cartItem->price * $cartItem->quantity,
                    ]);

                    if (! $orderItem) {
                        throw new Exception('Failed to create order item.');
                    }
                }
            }

            DB::commit();

            // Clear cart after successful order
            Cart::clear();

            return redirect()->route('orders.show', $order)
                ->with('success', 'Order placed successfully!');

        } catch (Exception) {
            DB::rollBack();

            return back()->with('error', 'There was an error processing your order. Please try again.');
        }
    }
}
