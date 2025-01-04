<div class="flex items-center space-x-4">
    <a href="{{ route('cart') }}" wire:navigate class="group -m-2 flex items-center p-2" aria-expanded="false">
        <svg class="h-6 w-6 flex-shrink-0 text-gray-900 group-hover:text-gray-800" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        <span
            class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-red-800 border border-red-800 text-white">{{ $count }}</span>
    </a>
    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 hover:bg-green-300 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 accent-white" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>
