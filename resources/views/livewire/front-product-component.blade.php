<div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white" wire:key="{{ $product->id }}">

    <!-- Loading Overlay with Text -->
    <div wire:loading.delay.class="flex" wire:loading.class.remove="hidden"
        class="hidden absolute inset-0 bg-gray-700 bg-opacity-75 items-center justify-center z-10">
        <div class="flex flex-col items-center text-white">
            <svg class="animate-spin h-8 w-8 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C4.58 0 0 4.58 0 10h4z"></path>
            </svg>
            <span class="text-lg font-semibold">Loading...</span>
        </div>
    </div>

    <!-- Image section -->
    <div class="h-56 overflow-hidden relative">
        @if ($product->image)
            <img class="w-full h-full object-cover px-3" src="storage/{{ $product->image }}" alt="{{ $product->name }}"
                loading="lazy" />
        @else
            <img class="w-full h-full object-contain p-8" src="{{ asset('assets/no-image.webp') }}"
                alt="{{ $product->name }}" loading="lazy" />
        @endif

        @if ($product->status)
            <span class="absolute top-4 right-4 bg-red-800 text-white px-2 py-1 rounded-full text-sm capitalize">
                {{ $product->status }}
            </span>
        @endif
    </div>

    <!-- Content section -->
    <div class="p-6">
        <a class="text-xl font-bold mb-2 text-gray-800 capitalize line-clamp-1">
            {{ $product->name }}
        </a>
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ Str::limit($product->description, 100) }}
        </p>

        <!-- Price and rating row -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-gray-900">
                    {{ $product->formattedPrice() }} / {{ $product->measurement ?? '' }}
                </span>
            </div>
        </div>

        <!-- Action button -->
        <button wire:click="{{ $added ? 'remove' : 'addToCart' }}" wire:loading.attr="disabled"
            class="w-full py-2 px-4 rounded-lg transition-colors duration-200 {{ $added ? 'bg-red-700 hover:bg-red-800' : 'bg-green-700 hover:bg-green-800' }} text-white">
            <span wire:loading.remove>{{ $added ? 'Remove from Basket' : 'Add to Cart' }}</span>
            <span wire:loading>Loading...</span>
        </button>
    </div>
</div>
