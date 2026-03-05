{{-- Portfolio Detail Page --}}

@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-slate-900 overflow-hidden min-h-screen flex items-center">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-1/4 w-1/2 h-full bg-primary/40 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-0 -right-1/4 w-1/2 h-full bg-primary/20 blur-[120px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 md:px-20 relative z-10 w-full py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center justify-items-center">
            <div class="flex flex-col gap-6 w-full max-w-xl lg:justify-self-end">
                {{-- Category Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary border-2 border-primary text-white text-xs font-bold uppercase tracking-wider w-fit shadow-lg">
                    {{ __('messages.portfolio.related') }}: {{ $portfolio->category ?? 'Digital Project' }}
                </div>

                {{-- Title --}}
                <h1 class="text-white text-4xl md:text-6xl font-black leading-[1.1] tracking-tight">
                    {{ $portfolio->title }}
                </h1>

                {{-- Excerpt --}}
                <p class="text-slate-400 text-lg md:text-xl leading-relaxed">
                    {{ $portfolio->excerpt }}
                </p>

                {{-- Project Meta --}}
                <div class="flex flex-wrap gap-4 mt-4">
                    @if ($portfolio->client)
                        <div class="flex flex-col">
                            <span class="text-slate-500 text-xs uppercase font-bold tracking-widest">{{ __('messages.portfolio.detail_client_label') }}</span>
                            <span class="text-white font-medium mt-1">{{ $portfolio->client }}</span>
                        </div>
                        <div class="w-px h-12 bg-slate-700 mx-2 hidden sm:block self-center"></div>
                    @endif

                    @if ($portfolio->published_at)
                        <div class="flex flex-col">
                            <span class="text-slate-500 text-xs uppercase font-bold tracking-widest">{{ __('messages.portfolio.detail_date_label') }}</span>
                            <span class="text-white font-medium mt-1">{{ $portfolio->published_at->translatedFormat('M Y') }}</span>
                        </div>
                        <div class="w-px h-12 bg-slate-700 mx-2 hidden sm:block self-center"></div>
                    @endif

                    @if ($portfolio->category)
                        <div class="flex flex-col">
                            <span class="text-slate-500 text-xs uppercase font-bold tracking-widest">{{ __('messages.portfolio.industry_label') }}</span>
                            <span class="text-white font-medium mt-1">{{ $portfolio->category }}</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right: Hero Mockup Image --}}
            <div class="relative flex justify-center items-center w-full max-w-2xl lg:justify-self-start min-h-[500px]">
                {{-- Main mockup --}}
                @if ($portfolio->thumbnail)
                    <img alt="{{ $portfolio->title }}" class="rounded-xl shadow-2xl border border-slate-700/50 w-full max-w-[600px] object-cover aspect-video relative z-10" src="{{ asset('storage/' . $portfolio->thumbnail) }}">

                    {{-- Phone mockup overlay --}}
                    @if ($portfolio->mobile_image)
                        <div class="absolute bottom-8 md:bottom-12 -right-8 md:-right-12 z-20 hidden md:block">
                            <div class="w-32 h-64 md:w-36 md:h-72 rounded-2xl border-4 border-slate-800 shadow-2xl overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $portfolio->mobile_image) }}');">
                            </div>
                        </div>
                    @endif
                @else
                    <div class="w-full max-w-[600px] aspect-video rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center">
                        <span class="material-symbols-outlined text-slate-600 text-6xl">image</span>
                    </div>
                @endif
            </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-6 md:px-20 py-20 w-full">

            {{-- Challenge-Solution-Result Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Challenge -->
            <div class="flex flex-col gap-6 p-8 rounded-2xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 transition-all hover:shadow-xl">
                <div class="size-12 rounded-xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-400 flex-shrink-0">
                    <span class="material-symbols-outlined">report_problem</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">{{ __('messages.portfolio.challenge') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        @if($portfolio->challenge)
                            {{ $portfolio->challenge }}
                        @else
                            {{ app()->getLocale() === 'en' 
                                ? 'This project faced complex challenges in terms of scalability, performance, and suboptimal user experience to achieve business targets.' 
                                : 'Proyek ini menghadapi tantangan kompleks dalam hal skalabilitas, performa, dan user experience yang kurang optimal untuk mencapai target bisnis.' }}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Solution -->
            <div class="flex flex-col gap-6 p-8 rounded-2xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 transition-all hover:shadow-xl">
                <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                    <span class="material-symbols-outlined">lightbulb</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">{{ __('messages.portfolio.solution') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        @if($portfolio->solution)
                            {{ $portfolio->solution }}
                        @else
                            {{ app()->getLocale() === 'en' 
                                ? 'We designed a modern architecture using cutting-edge technology, end-to-end performance optimization, and implementation of best practices for maximum results.' 
                                : 'Kami merancang arsitektur modern menggunakan teknologi terkini, optimasi performa end-to-end, dan implementasi best practices untuk hasil maksimal.' }}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Result -->
            <div class="flex flex-col gap-6 p-8 rounded-2xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 transition-all hover:shadow-xl">
                <div class="size-12 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600 dark:text-emerald-400 flex-shrink-0">
                    <span class="material-symbols-outlined">trending_up</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">{{ __('messages.portfolio.result') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                        Transformasi sukses dengan peningkatan metrik kinerja yang signifikan:
                    </p>
                    <div class="flex flex-col gap-2">
                        @if ($portfolio->result_metrics && isset($portfolio->result_metrics['metric_1']))
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400">{{ $portfolio->result_metrics['metric_1']['value'] }}</span>
                                <span class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-tighter">{{ $portfolio->result_metrics['metric_1']['label'] }}</span>
                            </div>
                        @endif
                        @if ($portfolio->result_metrics && isset($portfolio->result_metrics['metric_2']))
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400">{{ $portfolio->result_metrics['metric_2']['value'] }}</span>
                                <span class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-tighter">{{ $portfolio->result_metrics['metric_2']['label'] }}</span>
                            </div>
                        @endif
                        @if (!$portfolio->result_metrics || (empty($portfolio->result_metrics['metric_1']) && empty($portfolio->result_metrics['metric_2'])))
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400">+40%</span>
                                <span class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-tighter">Conversion Increase</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400">2.1s</span>
                                <span class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-tighter">Load Time (Avg)</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Full Description --}}
        @if ($portfolio->description)
            <div class="mt-24 prose dark:prose-invert max-w-none">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">{{ __('messages.portfolio.description') }}</h2>
                <div class="text-slate-700 dark:text-slate-300 leading-relaxed space-y-4">
                    {!! $portfolio->description !!}
                </div>
            </div>
        @endif

        {{-- Gallery Section --}}
        <div class="mt-24">
            <div class="mb-12">
                <h2 class="text-3xl font-bold mb-2 text-slate-900 dark:text-white">{{ __('messages.portfolio.gallery') }}</h2>
                <p class="text-slate-500 dark:text-slate-400">{{ __('messages.portfolio.gallery_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
                {{-- Gallery Item 1 --}}
                @if ($portfolio->gallery_image_1)
                    <div class="group relative overflow-hidden rounded-xl cursor-pointer bg-slate-100 dark:bg-slate-800" onclick="openLightbox('{{ asset('storage/' . $portfolio->gallery_image_1) }}')">
                        <img alt="Gallery 1" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $portfolio->gallery_image_1) }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-5xl">zoom_in</span>
                        </div>
                    </div>
                @endif

                {{-- Gallery Item 2 - portrait tall, spans 2 rows --}}
                @if ($portfolio->gallery_image_2)
                    <div class="group relative overflow-hidden rounded-xl cursor-pointer bg-slate-100 dark:bg-slate-800 lg:row-span-2" onclick="openLightbox('{{ asset('storage/' . $portfolio->gallery_image_2) }}')">
                        <img alt="Gallery 2" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $portfolio->gallery_image_2) }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-5xl">zoom_in</span>
                        </div>
                    </div>
                @endif

                {{-- Gallery Item 3 --}}
                @if ($portfolio->gallery_image_3)
                    <div class="group relative overflow-hidden rounded-xl cursor-pointer bg-slate-100 dark:bg-slate-800" onclick="openLightbox('{{ asset('storage/' . $portfolio->gallery_image_3) }}')">
                        <img alt="Gallery 3" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $portfolio->gallery_image_3) }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-5xl">zoom_in</span>
                        </div>
                    </div>
                @endif

                {{-- Gallery Item 4 --}}
                @if ($portfolio->gallery_image_4)
                    <div class="group relative overflow-hidden rounded-xl cursor-pointer bg-slate-100 dark:bg-slate-800" onclick="openLightbox('{{ asset('storage/' . $portfolio->gallery_image_4) }}')">
                        <img alt="Gallery 4" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $portfolio->gallery_image_4) }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-5xl">zoom_in</span>
                        </div>
                    </div>
                @endif

                {{-- Gallery Item 5 --}}
                @if ($portfolio->gallery_image_5)
                    <div class="group relative overflow-hidden rounded-xl cursor-pointer bg-slate-100 dark:bg-slate-800" onclick="openLightbox('{{ asset('storage/' . $portfolio->gallery_image_5) }}')">
                        <img alt="Gallery 5" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $portfolio->gallery_image_5) }}">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-5xl">zoom_in</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Lightbox Modal --}}
        <div id="lightbox" class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4 hidden" onclick="closeLightbox()">
            <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white bg-white/10 hover:bg-white/20 rounded-full p-2 transition-colors z-10">
                <span class="material-symbols-outlined text-3xl">close</span>
            </button>
            <img id="lightbox-img" src="" alt="Gallery Preview" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain" onclick="event.stopPropagation()">
        </div>

        <script>
            function openLightbox(src) {
                document.getElementById('lightbox-img').src = src;
                document.getElementById('lightbox').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            function closeLightbox() {
                document.getElementById('lightbox').classList.add('hidden');
                document.getElementById('lightbox-img').src = '';
                document.body.style.overflow = '';
            }
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeLightbox();
            });
        </script>
        </div>

        {{-- CTA Section --}}
        <div class="max-w-7xl mx-auto px-6 md:px-20 py-20">
            <div class="rounded-3xl bg-slate-900 px-8 py-20 text-center text-white dark:bg-slate-950">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ __('messages.portfolio.ready_to_start') }}</h2>
                <p class="mx-auto mb-10 max-w-xl text-lg text-slate-400">
                    {{ __('messages.portfolio.cta_description') }}
                </p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="{{ route('contact') }}"
                       class="rounded-xl bg-primary px-8 py-4 font-bold text-white shadow-xl shadow-primary/20 transition-all hover:bg-primary/90">
                        {{ __('messages.portfolio.book_consultation') }}
                    </a>
                    <a href="{{ route('portfolio.index') }}"
                       class="rounded-xl border border-white/20 bg-white/10 px-8 py-4 font-bold text-white transition-all hover:bg-white/20">
                        {{ __('messages.portfolio.view_more') }}
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
