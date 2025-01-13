<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckOutController extends Controller
{
    public function index()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('cart')
                ->with('error', 'Your cart is empty.');
        }

        seo()->title('Checkout');

        // Optimize by fetching all products at once
        $productIds = Cart::getContent()->pluck('id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $cartItemsWithDetails = Cart::getContent()->map(function ($item) use ($products) {
            if ($product = $products->get($item->id)) {
                return array_merge($item->toArray(), [
                    'image_url' => $product->image,
                    'measurement' => $product->measurement,
                ]);
            }

            return null;
        })->filter();

        return view('check-out', [
            'cartItems' => $cartItemsWithDetails,
            'subtotal' => Cart::getSubTotal(),
            'total' => Cart::getTotal(),
        ]);
    }

    public function order(Request $request)
    {
        if (Cart::isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'customer_address' => 'required|string|max:1000',
            'customer_note' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            // Fetch all products at once to reduce database queries
            $cartItems = Cart::getContent();
            $productIds = $cartItems->pluck('id');
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            // Validate all products exist
            $missingProducts = $cartItems->filter(fn ($item) => ! $products->has($item->id));
            if ($missingProducts->isNotEmpty()) {
                throw new Exception('One or more products in your cart are no longer available.');
            }

            // Create order
            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $validated['customer_address'],
                'customer_note' => $validated['customer_note'] ?? null,
                'status' => OrderStatus::PENDING,
            ]);

            // Create order items
            $orderItems = $cartItems->map(function ($cartItem) use ($products) {
                $product = $products->get($cartItem->id);

                return [
                    'product_id' => $product->id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                    'subtotal' => $cartItem->price * $cartItem->quantity,
                ];
            })->values()->toArray();

            $order->orderItems()->createMany($orderItems);

            DB::commit();

            // Clear cart after successful order
            Cart::clear();

            return redirect()->route('orders.show', ['order' => encrypt($order->id)])
                ->with('success', 'Order placed successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Checkout Error: '.$e->getMessage(), [
                'user_input' => $validated,
                'cart_items' => Cart::getContent()->toArray(),
            ]);

            return back()->with('error', 'There was an error processing your order. Please try again.');
        }
    }

    public function show(Request $request, $order)
    {
        try {
            $orderId = decrypt($order);
            $order = Order::findOrFail($orderId);

         


            return view('orders.show', compact('order'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Invalid order link.');
        }
    }
}
