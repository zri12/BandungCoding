{{-- Komponen Service Card --}}
{{-- Card layanan dengan icon, judul, excerpt, dan link detail --}}
@props(['service'])

<div class="group p-6 lg:p-8 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 hover:-translate-y-1 transition-all duration-300">
    {{-- Icon --}}
    <div class="w-12 h-12 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl flex items-center justify-center mb-5 group-hover:from-blue-600 group-hover:to-indigo-600 transition-all duration-300">
        <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
        </svg>
    </div>

    {{-- Title --}}
    <h3 class="text-lg font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">
        {{ $service->title }}
    </h3>

    {{-- Excerpt --}}
    <p class="text-sm text-slate-500 leading-relaxed mb-4">
        {{ $service->excerpt }}
    </p>

    {{-- Link --}}
    <a href="{{ route('layanan.show', $service->slug) }}"
       class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">
        Selengkapnya
        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>
