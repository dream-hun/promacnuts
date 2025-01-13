<div class="py-12">
    <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
            @forelse($products as $product)
                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white" x-data="{ loading: false }"
                    x-init="@this.on('update-cart', () => loading = false)" wire:key="{{ $product->id }}">
                    <!-- Image section -->
                    <div class="h-56 overflow-hidden relative">
                        <a href="/shop/products/{{ $product->slug }}">
                            @if ($product->image)
                                <img class="w-full h-full object-cover px-3" src="storage/{{ $product->image }}"
                                    alt="{{ $product->name }}" loading="lazy" />
                            @else
                                <img class="w-full h-full object-contain p-8" src="{{ asset('assets/no-image.webp') }}"
                                    alt="{{ $product->name }}" loading="lazy" />
                            @endif
                        </a>
                        @if ($product->status)
                            <span
                                class="absolute top-4 right-4 bg-red-700 text-white px-2 py-1 rounded-md text-sm capitalize">
                                {{ $product->status }}
                            </span>
                        @endif
                    </div>

                    <!-- Content section -->
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-gray-800 capitalize line-clamp-1">
                            {{ $product->name }}
                        </h2>

                        <!-- Price and rating row -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col">
                                <span class="text-md font-semibold text-gray-900">
                                    {{ $product->formattedPrice() }} / {{ $product->measurement ?? '' }}
                                </span>
                            </div>
                        </div>

                        <!-- Action button with loader -->
                        <button x-on:click="loading = true" x-bind:disabled="loading"
                            wire:click="{{ $product->inCart ? 'removeFromCart(' . $product->id . ')' : 'addToCart(' . $product->id . ')' }}"
                            wire:loading.attr="disabled" wire:loading.class="bg-gray-500"
                            class="w-full py-2.5 px-4 rounded-lg transition-all duration-200 font-medium text-sm text-white focus:outline-none focus:ring-4 {{ $product->inCart
                                ? 'bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800'
                                : 'bg-green-600 hover:bg-green-700 focus:ring-green-300 dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-800' }}">
                            <span
                                x-show="!loading">{{ $product->inCart ? 'Remove from Basket' : 'Add to Cart' }}</span>
                            <span x-show="loading">
                                <svg class="animate-spin h-5 w-5 mx-auto text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C4.58 0 0 4.58 0 10h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

            @empty
                <div class="flex w-full items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Oops!</span>No products available here
                    </div>
                </div>
            @endforelse
        </div>
        <!-- pagination start -->
        <div class="flex justify-end mt-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
