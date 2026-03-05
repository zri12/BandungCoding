<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Meta Tags Component --}}
    <x-seo.meta
        :title="$metaTitle ?? \App\Domain\Setting\Models\Setting::getValue('seo_meta_title', config('bandungcoding.seo.title'))"
        :description="$metaDescription ?? \App\Domain\Setting\Models\Setting::getValue('seo_meta_description', config('bandungcoding.seo.description'))"
    />

    {{-- Dark Mode Init Script (Prevent FOUC) --}}
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    {{-- Favicon --}}
    @php
        $faviconPath = \App\Domain\Setting\Models\Setting::getValue('logo_favicon');
    @endphp
    @if ($faviconPath)
        <link rel="icon" href="{{ asset('storage/' . $faviconPath) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @endif

    {{-- Google Fonts: Inter & Material Symbols --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    {{-- Vite Assets –  CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Slot untuk CSS tambahan per halaman --}}
    @stack('styles')
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen antialiased">
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">

    {{-- Navigasi Utama --}}
    <x-navbar />

    {{-- Konten Halaman --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Floating WhatsApp Button --}}
    <x-whatsapp-float />

</div>

    {{-- Slot untuk JS tambahan per halaman --}}
    @stack('scripts')

</body>
</html>
