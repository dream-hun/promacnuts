<div class="w-full max-w-[150rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                    @if (count($cartItems))
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left font-semibold">Product</th>
                                    <th class="text-left font-semibold">Price</th>
                                    <th class="text-left font-semibold">Quantity</th>
                                    <th class="text-left font-semibold">Total</th>
                                    <th class="text-left font-semibold">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4 object-contain rounded-full"
                                                    src="{{ $item['image_url'] ?? asset('/images/No-image.png') }}"
                                                    alt="{{ $item['name'] }}">
                                                <span class="font-semibold">{{ $item['name'] }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ Cknow\Money\Money::RWF($item['price']) }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button wire:click="decreaseQuantity('{{ $item['id'] }}')"
                                                    class="border rounded-md py-2 px-4 mr-2">-</button>
                                                <span class="text-center w-8">{{ $item['quantity'] }}</span>
                                                <button wire:click="increaseQuantity('{{ $item['id'] }}')"
                                                    class="border rounded-md py-2 px-4 ml-2">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            {{ Cknow\Money\Money::RWF($item['price'] * $item['quantity']) }}</td>
                                        <td>
                                            <button wire:click="removeItem('{{ $item['id'] }}')"
                                                class="bg-red-700 border-2 border-red-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white text-white hover:border-red-700">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Danger alert!</span> You have no products in the shopping
                                cart.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    @if (count($cart))
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Subtotal</span>
                            <span>{{ Cknow\Money\Money::RWF(Cart::getSubTotal()) }}</span>
                        </div>


                        <hr class="my-2">
                        <div class="flex justify-between mb-10">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">{{ Cknow\Money\Money::RWF(Cart::getSubTotal()) }}</span>
                        </div>
                        <a href="{{ route('checkout') }}"
                            class="bg-green-500 text-white py-2 px-4 rounded-lg mt-6 w-full">Checkout</a>
                    @else
                        <a href="{{ route('shop') }}" wire:navigate
                            class="bg-yellow-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Go shopping</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
