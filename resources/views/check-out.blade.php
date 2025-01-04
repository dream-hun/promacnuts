<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('checkout.store') }}" class="p-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Customer Information -->
                        <div class="space-y-6">
                            <h2 class="text-lg font-semibold">Customer Information</h2>

                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="customer_email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="customer_email" id="customer_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="customer_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" name="customer_phone" id="customer_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>

                            <div>
                                <label for="customer_address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="customer_address" id="customer_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                            </div>

                            <div>
                                <label for="customer_note" class="block text-sm font-medium text-gray-700">Note (Optional)</label>
                                <textarea name="customer_note" id="customer_note" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
                            <div class="border rounded-lg divide-y">
                                @foreach($cartItems as $item)
                                <div class="p-4 flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                                        <div>
                                            <h3 class="font-medium">{{ $item->product->name }}</h3>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium">{{ $item->formattedSubtotal() }}</p>
                                        <p class="text-sm text-gray-500">{{ $item->formattedPrice() }} each</p>
                                    </div>
                                </div>
                                @endforeach

                                <div class="p-4">
                                    <div class="flex justify-between py-2">
                                        <span>Subtotal</span>
                                        <span>{{ $cart->formattedSubtotal() }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 font-semibold">
                                        <span>Total</span>
                                        <span>{{ $cart->formattedTotal() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
