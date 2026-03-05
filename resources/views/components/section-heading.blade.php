{{-- Komponen Section Heading --}}
{{-- Heading konsisten untuk setiap section halaman --}}
@props([
    'title',
    'subtitle' => null,
    'centered' => true,
])

<div class="{{ $centered ? 'text-center' : '' }} mb-12 lg:mb-16">
    <h2 class="text-3xl lg:text-4xl font-bold text-slate-800 tracking-tight">
        {{ $title }}
    </h2>
    @if ($subtitle)
        <p class="mt-4 text-lg text-slate-500 max-w-2xl {{ $centered ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
    <div class="mt-4 w-16 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full {{ $centered ? 'mx-auto' : '' }}"></div>
</div>
