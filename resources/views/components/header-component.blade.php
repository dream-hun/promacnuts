<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }" class="sticky top-0 z-50 shadow-md">
    <!-- Top Bar - Hidden on Mobile -->
    <div class="hidden sm:block bg-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2">
                <!-- Contact Information with Icons -->
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <a href="tel:{{ $setting->mobile }}" class="text-sm hover:text-green-200 transition-colors">
                            {{ $setting->mobile }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <a href="tel:{{ $setting->mobile_two }}" class="text-sm hover:text-green-200 transition-colors">
                            {{ $setting->mobile_two }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M3 20.29V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7.961a2 2 0 0 0-1.561.75l-2.331 2.914A.6.6 0 0 1 3 20.29z" />
                            <path d="M8 10h8" />
                            <path d="M8 14h4" />
                        </svg>
                        <a href="https://wa.me/{{ $setting->whatsapp }}"
                            class="text-sm hover:text-green-200 transition-colors">
                            {{ $setting->whatsapp }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        <a href="mailto:{{ $setting->email_one }}"
                            class="text-sm hover:text-green-200 transition-colors">
                            {{ $setting->email_one }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        <a href="mailto:{{ $setting->email_two }}"
                            class="text-sm hover:text-green-200 transition-colors">
                            {{ $setting->email_two }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <span class="text-sm">{{ $setting->address }}</span>
                    </div>
                </div>
                <!-- Sign In Link -->
                <div class="mt-2 sm:mt-0">
                    <a href="/admin/login"
                        class="text-sm hover:text-green-200 transition-colors flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Sign in
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-white text-black py-4">
        <div class="container mx-auto px-4">
            <!-- Desktop Layout -->
            <div class="hidden md:grid md:grid-cols-3 items-center">
                <!-- Logo - Left -->
                <div class="flex items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('assets/Logo.png') }}" alt="{{ config('app.name') }}" class="h-14 w-auto">
                    </a>
                </div>

                <!-- Navigation - Center -->
                <nav class="flex justify-center">
                    <div class="flex space-x-8">
                        <a href="{{ route('welcome') }}"
                            class="text-lg transition-colors relative group {{ request()->routeIs('welcome') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Home
                            <span
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-green-700 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('landing') ? 'scale-x-100' : '' }}"></span>
                        </a>
                        <a href="{{ route('shop') }}"
                            class="text-lg transition-colors relative group {{ request()->routeIs('shop') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Shop
                            <span
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-green-700 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('shop') ? 'scale-x-100' : '' }}"></span>
                        </a>

                        <a href="{{ route('contact') }}"
                            class="text-lg transition-colors relative group {{ request()->routeIs('contact') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Contact us
                            <span
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-green-700 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ request()->routeIs('contact') ? 'scale-x-100' : '' }}"></span>
                        </a>

                    </div>
                </nav>

                <!-- Search and Cart - Right -->
                <div class="flex justify-end items-center space-x-4">
                    <livewire:search-component />
                    <livewire:cart-counter-component />
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="md:hidden">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('assets/Logo.png') }}" alt="{{ config('app.name') }}"
                            class="h-10 w-auto">
                    </a>

                    <!-- Search, Cart, and Menu Button -->
                    <div class="flex items-center space-x-4">
                        <livewire:search-component />
                        <livewire:cart-counter-component />

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" class="mt-4" x-transition>
                    <nav class="flex flex-col space-y-4">
                        <a href="{{ route('welcome') }}"
                            class="py-2 transition-colors {{ request()->routeIs('welcome') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Home
                        </a>
                        <a href="{{ route('shop') }}"
                            class="py-2 transition-colors {{ request()->routeIs('shop') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Shop
                        </a>

                        <a href="{{ route('contact') }}"
                            class="py-2 transition-colors {{ request()->routeIs('contact') ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                            Contact us
                        </a>

                    </nav>
                </div>
            </div>
        </div>
    </header>
</nav>
