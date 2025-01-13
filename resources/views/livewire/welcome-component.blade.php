@php use App\Models\Product; @endphp
<div class="top-1">
    <div class="bg-white">
        <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('assets/Macadamia-Nuts.webp') }}" alt="{{ config('app.name') }}"
                     class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-60"></div>

            <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
                <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">Promacnuts Ltd</h1>
                <p class="mt-4 text-xl text-white">
                    Promacnuts is private company that has the mission of promoting the farming of macadamia plants,restoring ecological functionality, to build research, training and innovation centers for ecological restoration through macadamia planting.
                </p>
                <a href="{{ route('shop') }}"
                   class="mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900">Shop
                    Now</a>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-[1200px] px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest products</h2>
                <a href="{{ route('shop') }}"
                   class="hidden text-sm font-medium text-green-600 hover:text-green-500 md:block">
                    Shop all products
                    <span aria-hidden="true"> →</span>
                </a>
            </div>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3 mt-5">
                @forelse(Product::orderBy('created_at', 'DESC')->get() as $item)
                    <livewire:front-product-component :product="$item"/>
                @empty
                    <p class="text-lg"> No product found</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
