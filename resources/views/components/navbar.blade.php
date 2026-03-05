<header class="fixed inset-x-0 top-0 z-50 border-b border-primary/10 bg-white/85 backdrop-blur-md transition-all duration-300 dark:bg-slate-950/85" id="main-navbar">
    <div class="mx-auto flex w-full max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8 xl:px-10">
        <a href="{{ route('home') }}" class="group flex shrink-0 items-center">
            @php
                $logoNavbar = \App\Domain\Setting\Models\Setting::getValue('logo_navbar');
            @endphp
            @if ($logoNavbar)
                <img src="{{ str_starts_with($logoNavbar, 'data:') ? $logoNavbar : asset('storage/' . $logoNavbar) }}" alt="Logo" class="h-10 w-auto object-contain transition-transform group-hover:scale-105" style="max-height:40px;width:auto;">
            @else
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-white transition-transform group-hover:scale-105">
                    <span class="material-symbols-outlined">terminal</span>
                </div>
            @endif
        </a>

        <nav class="hidden flex-1 justify-center gap-7 xl:flex">
            <a class="text-sm font-semibold transition-colors {{ request()->routeIs('home') ? 'text-primary' : 'hover:text-primary' }}" href="{{ route('home') }}">{{ __('messages.navbar.home') }}</a>
            <a class="text-sm font-semibold transition-colors {{ request()->routeIs('layanan.*') ? 'text-primary' : 'hover:text-primary' }}" href="{{ route('layanan.index') }}">{{ __('messages.navbar.services') }}</a>
            <a class="text-sm font-semibold transition-colors {{ request()->routeIs('about') ? 'text-primary' : 'hover:text-primary' }}" href="{{ route('about') }}">{{ __('messages.navbar.about') }}</a>
            <a class="text-sm font-semibold transition-colors {{ request()->routeIs('portfolio.*') ? 'text-primary' : 'hover:text-primary' }}" href="{{ route('portfolio.index') }}">{{ __('messages.navbar.portfolio') }}</a>
            <a class="text-sm font-semibold transition-colors {{ request()->routeIs('blog.*') ? 'text-primary' : 'hover:text-primary' }}" href="{{ route('blog.index') }}">{{ __('messages.navbar.blog') }}</a>
        </nav>

        <div class="ml-auto flex items-center gap-2 sm:gap-3">
            <div class="hidden items-center gap-1 rounded-lg bg-slate-100 p-1 dark:bg-slate-800 sm:flex">
                <a href="{{ route('locale.switch', 'id') }}" class="rounded-md px-2 py-1 text-xs font-bold transition-colors {{ App::getLocale() == 'id' ? 'bg-white text-primary shadow-sm dark:bg-slate-700 dark:text-white' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white' }}">ID</a>
                <a href="{{ route('locale.switch', 'en') }}" class="rounded-md px-2 py-1 text-xs font-bold transition-colors {{ App::getLocale() == 'en' ? 'bg-white text-primary shadow-sm dark:bg-slate-700 dark:text-white' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white' }}">EN</a>
            </div>

            <button id="theme-toggle" type="button" class="rounded-lg p-2 text-slate-500 transition-colors hover:bg-slate-100 focus:outline-none dark:text-slate-400 dark:hover:bg-slate-800" aria-label="Toggle Dark Mode">
                <span id="theme-toggle-dark-icon" class="material-symbols-outlined hidden">dark_mode</span>
                <span id="theme-toggle-light-icon" class="material-symbols-outlined hidden">light_mode</span>
            </button>

            <a href="{{ route('contact') }}" class="hidden rounded-lg bg-primary px-4 py-2 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-primary/90 md:inline-flex xl:hidden">
                {{ __('messages.navbar.contact_us') }}
            </a>

            <a href="{{ route('contact') }}" class="hidden rounded-lg bg-slate-100 px-5 py-2.5 text-sm font-bold text-slate-900 transition-all hover:bg-slate-200 dark:bg-slate-800 dark:text-white xl:inline-flex">
                {{ __('messages.navbar.free_consultation') }}
            </a>
            <a href="{{ route('contact') }}" class="hidden rounded-lg bg-primary px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-primary/90 xl:inline-flex">
                {{ __('messages.navbar.contact_us') }}
            </a>

            <button id="mobile-menu-button" class="rounded-lg p-2 text-primary transition-colors hover:bg-slate-100 dark:hover:bg-slate-800 xl:hidden" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
                <span class="material-symbols-outlined" data-menu-icon>menu</span>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-slate-100 bg-white px-4 py-4 shadow-lg dark:border-slate-800 dark:bg-background-dark xl:hidden">
        <div class="mx-auto max-w-7xl">
            <div class="mb-4 flex items-center justify-center gap-3 sm:hidden">
                <div class="flex items-center gap-1 rounded-lg bg-slate-100 p-1 dark:bg-slate-800">
                    <a href="{{ route('locale.switch', 'id') }}" class="rounded-md px-2 py-1 text-xs font-bold transition-colors {{ App::getLocale() == 'id' ? 'bg-white text-primary shadow-sm dark:bg-slate-700 dark:text-white' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white' }}">ID</a>
                    <a href="{{ route('locale.switch', 'en') }}" class="rounded-md px-2 py-1 text-xs font-bold transition-colors {{ App::getLocale() == 'en' ? 'bg-white text-primary shadow-sm dark:bg-slate-700 dark:text-white' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white' }}">EN</a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-2">
                <a class="rounded-lg px-3 py-2 text-sm font-semibold transition-colors {{ request()->routeIs('home') ? 'bg-primary/10 text-primary' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('home') }}">{{ __('messages.navbar.home') }}</a>
                <a class="rounded-lg px-3 py-2 text-sm font-semibold transition-colors {{ request()->routeIs('layanan.*') ? 'bg-primary/10 text-primary' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('layanan.index') }}">{{ __('messages.navbar.services') }}</a>
                <a class="rounded-lg px-3 py-2 text-sm font-semibold transition-colors {{ request()->routeIs('about') ? 'bg-primary/10 text-primary' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('about') }}">{{ __('messages.navbar.about') }}</a>
                <a class="rounded-lg px-3 py-2 text-sm font-semibold transition-colors {{ request()->routeIs('portfolio.*') ? 'bg-primary/10 text-primary' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('portfolio.index') }}">{{ __('messages.navbar.portfolio') }}</a>
                <a class="rounded-lg px-3 py-2 text-sm font-semibold transition-colors {{ request()->routeIs('blog.*') ? 'bg-primary/10 text-primary' : 'hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('blog.index') }}">{{ __('messages.navbar.blog') }}</a>
            </div>

            <div class="mt-4 grid grid-cols-1 gap-2 sm:grid-cols-2">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-lg bg-slate-100 px-4 py-2.5 text-sm font-bold text-slate-900 transition-all hover:bg-slate-200 dark:bg-slate-800 dark:text-white">
                    {{ __('messages.navbar.free_consultation') }}
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-lg bg-primary px-4 py-2.5 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-primary/90">
                    {{ __('messages.navbar.contact_us') }}
                </a>
            </div>
        </div>
    </div>
</header>