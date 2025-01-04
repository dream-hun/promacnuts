<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('error'))
                    <div class="p-4 bg-red-50 border-l-4 border-red-500">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('checkout.store') }}" class="p-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Customer Information -->
                        <div class="space-y-6">
                            <h2 class="text-lg font-semibold">Customer Information</h2>

                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="customer_name" id="customer_name"
                                    value="{{ old('customer_name') }}"
                                    class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_name') border-red-300 @enderror">
                                @error('customer_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="customer_email"
                                    class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="customer_email" id="customer_email"
                                    value="{{ old('customer_email') }}"
                                    class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_email') border-red-300 @enderror">
                                @error('customer_email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="customer_phone"
                                    class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" name="customer_phone" id="customer_phone"
                                    value="{{ old('customer_phone') }}"
                                    class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_phone') border-red-300 @enderror">
                                @error('customer_phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="customer_address"
                                    class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="customer_address" id="customer_address" rows="3"
                                    class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_address') border-red-300 @enderror">{{ old('customer_address') }}</textarea>
                                @error('customer_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="customer_note" class="block text-sm font-medium text-gray-700">Note
                                    (Optional)</label>
                                <textarea name="customer_note" id="customer_note" rows="2"
                                    class="mt-1 block w-full rounded-md  shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('customer_note') border-red-300 @enderror">{{ old('customer_note') }}</textarea>
                                @error('customer_note')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
                            <div class="border rounded-lg divide-y">
                                @foreach ($cartItems as $item)
                                    <div class="p-4 flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            @if ($item['image_url'])
                                                <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}"
                                                    class="w-16 h-16 object-cover rounded">
                                            @endif
                                            <div>
                                                <h3 class="font-medium">{{ $item['name'] }}</h3>
                                                @if ($item['measurement'])
                                                    <p class="text-sm text-gray-500">{{ $item['measurement'] }}</p>
                                                @endif
                                                <p class="text-sm text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-medium">
                                                {{ Cknow\Money\Money::RWF($item['price'] * $item['quantity'], 2) }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ Cknow\Money\Money::RWF($item['price']) }}
                                                each</p>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="p-4 bg-gray-50">
                                    <div class="flex justify-between py-2">
                                        <span class="text-gray-600">Subtotal</span>
                                        <span class="font-medium">{{ Cknow\Money\Money::RWF($subtotal) }}</span>
                                    </div>
                                    <div class="flex justify-between py-2 font-semibold text-lg">
                                        <span>Total</span>
                                        <span>{{ Cknow\Money\Money::RWF($total) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
