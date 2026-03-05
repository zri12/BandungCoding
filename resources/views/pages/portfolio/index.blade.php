@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-7xl px-4 pb-10 pt-32 sm:px-6 lg:pb-12 lg:pt-36" data-animate="fade-up">
    <div class="relative mb-16 flex min-h-[420px] items-center justify-center overflow-hidden rounded-2xl text-center md:min-h-[460px]">
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBxWEivvE-r7ssFr5vCquqAbd6C4pWBGiN9NiSottPtXJwZra-Tj0AsWObcG9KxhVTEviuHjjMVSf0EN0LOwo77XU8MU6VOv964Nf9UBbaVWhBQTyS8JAJyqDC26gacsaCUV5zyxMvFTMnWPprB_Cidvzh5IIyrTq8rdJu9Tc6MTOCiI0imLeT3EF8czbP_pYeftnEd_RR9VcYWiHHID6tamajbgDz-1g22QPaAsfx8J-FjGURr-zaoOA1IKhfMxbqwdCyo9y2Mh2pN');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/90 to-primary/40"></div>

        <div class="relative z-10 max-w-2xl px-4">
            <h1 class="mb-6 text-4xl font-black tracking-tight text-white md:text-5xl">
                {{ __('messages.portfolio.hero_title') }}
            </h1>
            <p class="mb-8 text-base font-medium leading-relaxed text-white/90 md:text-lg">
                {{ __('messages.portfolio.hero_desc') }}
            </p>
            <a href="#portfolio-grid"
               class="mx-auto inline-flex items-center gap-2 rounded-xl bg-white px-8 py-4 font-bold text-primary transition-all hover:bg-slate-50">
                {{ __('messages.portfolio.hero_cta') }}
                <span class="material-symbols-outlined">expand_more</span>
            </a>
        </div>
    </div>

    <div id="portfolio-grid" class="mb-12 flex flex-wrap justify-center gap-3">
        <button class="rounded-full bg-primary px-6 py-2.5 text-sm font-semibold text-white shadow-md">
            {{ __('messages.portfolio.filter_all') }}
        </button>
        <button class="rounded-full border border-slate-200 bg-white px-6 py-2.5 text-sm font-semibold text-slate-600 transition-all hover:bg-primary/10 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
            {{ __('messages.portfolio.filter_web') }}
        </button>
        <button class="rounded-full border border-slate-200 bg-white px-6 py-2.5 text-sm font-semibold text-slate-600 transition-all hover:bg-primary/10 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
            {{ __('messages.portfolio.filter_mobile') }}
        </button>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" data-stagger>
        @forelse($portfolios as $portfolio)
            <article class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
                @if ($portfolio->thumbnail || $portfolio->image)
                    <div class="aspect-video w-full overflow-hidden bg-slate-100 dark:bg-slate-800">
                        <img src="{{ asset('storage/' . ($portfolio->thumbnail ?? $portfolio->image)) }}"
                             alt="{{ $portfolio->title }}"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy">
                    </div>
                @else
                    <div class="flex aspect-video w-full items-center justify-center bg-gradient-to-br from-slate-200 via-slate-100 to-slate-300 dark:from-slate-700 dark:via-slate-800 dark:to-slate-900">
                        <span class="material-symbols-outlined text-6xl text-slate-400 dark:text-slate-500">deployed_code</span>
                    </div>
                @endif

                <div class="absolute inset-0 flex flex-col items-center justify-center bg-primary/90 p-6 text-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <span class="mb-2 text-xs font-bold uppercase tracking-widest text-white/70">
                        {{ $portfolio->category ?? __('messages.portfolio.default_category') }}
                    </span>
                    <h3 class="mb-6 text-2xl font-bold text-white">{{ $portfolio->title }}</h3>
                    <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-2.5 text-sm font-bold text-primary transition-all hover:bg-slate-100">
                        {{ __('messages.portfolio.view_detail') }}
                        <span class="material-symbols-outlined text-sm">arrow_forward_ios</span>
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-full py-20 text-center">
                <div class="mb-4 inline-flex h-20 w-20 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                    <span class="material-symbols-outlined text-4xl">folder_off</span>
                </div>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white">{{ __('messages.portfolio.empty_title') }}</h3>
                <p class="mt-2 text-slate-500 dark:text-slate-400">{{ __('messages.portfolio.empty_desc') }}</p>
            </div>
        @endforelse
    </div>

    @if($portfolios->hasPages())
        <div class="mt-14">
            {{ $portfolios->links() }}
        </div>
    @endif

    <section class="mt-24 rounded-3xl bg-slate-900 px-8 py-20 text-center text-white dark:bg-slate-950" data-animate="zoom-in">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ __('messages.portfolio.cta_title') }}</h2>
        <p class="mx-auto mb-10 max-w-xl text-lg text-slate-400">
            {{ __('messages.portfolio.cta_desc') }}
        </p>
        <div class="flex flex-col justify-center gap-4 sm:flex-row">
            <a href="{{ route('contact') }}"
               class="rounded-xl bg-primary px-8 py-4 font-bold text-white shadow-xl shadow-primary/20 transition-all hover:bg-primary/90">
                {{ __('messages.portfolio.cta_btn_contact') }}
            </a>
            <a href="{{ route('layanan.index') }}"
               class="rounded-xl border border-white/20 bg-white/10 px-8 py-4 font-bold text-white transition-all hover:bg-white/20">
                {{ __('messages.portfolio.cta_btn_services') }}
            </a>
        </div>
    </section>
</section>
@endsection
