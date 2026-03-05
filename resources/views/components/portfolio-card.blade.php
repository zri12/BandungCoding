{{-- Komponen Portfolio Card --}}
{{-- Card portfolio dengan gambar, kategori, judul, dan tech stack --}}
@props(['portfolio'])

<div class="group overflow-hidden bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
    {{-- Image --}}
    <div class="aspect-video bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
        @if ($portfolio->thumbnail || $portfolio->image)
            <img src="{{ asset('storage/' . ($portfolio->thumbnail ?? $portfolio->image)) }}"
                 alt="{{ $portfolio->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="p-5 lg:p-6">
        {{-- Category --}}
        @if ($portfolio->category)
            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-full mb-3">
                {{ $portfolio->category }}
            </span>
        @endif

        {{-- Title --}}
        <h3 class="text-lg font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">
            <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                {{ $portfolio->title }}
            </a>
        </h3>

        {{-- Excerpt --}}
        <p class="text-sm text-slate-500 leading-relaxed mb-4">
            {{ Str::limit($portfolio->excerpt, 100) }}
        </p>

        {{-- Tech Stack --}}
        @if ($portfolio->tech_stack)
            <div class="flex flex-wrap gap-2">
                @foreach ($portfolio->tech_stack as $tech)
                    <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-md">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</div>
