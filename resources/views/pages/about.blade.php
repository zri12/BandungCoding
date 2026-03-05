@extends('layouts.app')

@section('content')
@php
    $stats = [
        ['value' => '50+', 'label' => __('messages.about.stats_projects'), 'icon' => 'rocket_launch'],
        ['value' => '50+', 'label' => __('messages.about.stats_clients'), 'icon' => 'groups'],
        ['value' => '5+', 'label' => __('messages.about.stats_experience'), 'icon' => 'verified'],
        ['value' => '10+', 'label' => __('messages.about.stats_team'), 'icon' => 'diversity_3'],
    ];

    $values = [
        ['title' => __('messages.about.val_1_title'), 'desc' => __('messages.about.val_1_desc'), 'icon' => 'workspace_premium'],
        ['title' => __('messages.about.val_2_title'), 'desc' => __('messages.about.val_2_desc'), 'icon' => 'bolt'],
        ['title' => __('messages.about.val_3_title'), 'desc' => __('messages.about.val_3_desc'), 'icon' => 'favorite'],
    ];
@endphp

<section class="mx-auto max-w-7xl px-4 pb-20 pt-32 sm:px-6 lg:pt-36" data-animate="fade-up">
    <section class="relative overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-br from-primary via-[#0a3a8a] to-[#0b1f4f] px-8 py-12 text-white shadow-[0_24px_60px_rgba(11,61,147,0.25)] lg:px-12 lg:py-16">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_10%_15%,rgba(255,255,255,0.2),transparent_45%)]"></div>
        <div class="pointer-events-none absolute inset-0 opacity-25" style="background-image:url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1400&q=80'); background-size:cover; background-position:center;"></div>
        <div class="pointer-events-none absolute -right-16 -bottom-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 max-w-3xl">
            <p class="mb-4 inline-flex rounded-full border border-white/25 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-white/85">
                {{ __('messages.about.hero_badge') }}
            </p>
            <h1 class="mb-5 text-4xl font-black leading-tight tracking-tight md:text-5xl lg:text-6xl">
                {{ __('messages.about.hero_title') }}
            </h1>
            <p class="mb-8 max-w-2xl text-base leading-relaxed text-white/90 md:text-lg">
                {{ __('messages.about.hero_desc') }}
            </p>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="#story" class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3 text-sm font-bold text-primary transition-all hover:bg-slate-100">
                    {{ __('messages.about.hero_btn1') }}
                </a>
                <a href="#team" class="inline-flex items-center justify-center rounded-xl border border-white/30 bg-white/10 px-6 py-3 text-sm font-bold text-white transition-all hover:bg-white/20">
                    {{ __('messages.about.hero_btn2') }}
                </a>
            </div>
        </div>
    </section>

    <section class="mt-8 grid grid-cols-2 gap-4 md:grid-cols-4" data-animate="fade-up" data-delay="200">
        @foreach ($stats as $stat)
            <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <div class="mb-3 inline-flex rounded-lg bg-primary/10 p-2 text-primary">
                    <span class="material-symbols-outlined !text-xl">{{ $stat['icon'] }}</span>
                </div>
                <p class="text-2xl font-black tracking-tight text-slate-900 dark:text-slate-100">{{ $stat['value'] }}</p>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</p>
            </article>
        @endforeach
    </section>

    <section id="story" class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-[1.1fr_0.9fr]" data-animate="fade-up">
        <article class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-700 dark:bg-slate-900 lg:p-10">
            <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-primary">{{ __('messages.about.story_badge') }}</p>
            <h2 class="mb-5 text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-4xl">
                {{ __('messages.about.story_title') }}
            </h2>
            <p class="mb-4 text-base leading-relaxed text-slate-600 dark:text-slate-400">
                {{ __('messages.about.story_p1') }}
            </p>
            <p class="text-base leading-relaxed text-slate-600 dark:text-slate-400">
                {{ __('messages.about.story_p2') }}
            </p>
        </article>

        <div class="space-y-6">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <div class="mb-3 inline-flex rounded-lg bg-primary/10 p-2 text-primary">
                    <span class="material-symbols-outlined">visibility</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900 dark:text-slate-100">{{ __('messages.about.vision_title') }}</h3>
                <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.about.vision_desc') }}</p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <div class="mb-3 inline-flex rounded-lg bg-primary/10 p-2 text-primary">
                    <span class="material-symbols-outlined">flag</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900 dark:text-slate-100">{{ __('messages.about.mission_title') }}</h3>
                <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.about.mission_desc') }}</p>
            </article>
        </div>
    </section>

    <section class="mt-16" data-animate="fade-up">
        <div class="mb-8 text-center">
            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-primary">{{ __('messages.about.values_badge') }}</p>
            <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-4xl">
                {{ __('messages.about.values_title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-3" data-stagger>
            @foreach ($values as $value)
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-transform hover:-translate-y-1 dark:border-slate-700 dark:bg-slate-900">
                    <div class="mb-4 inline-flex rounded-xl bg-primary/10 p-3 text-primary">
                        <span class="material-symbols-outlined">{{ $value['icon'] }}</span>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-slate-900 dark:text-slate-100">{{ $value['title'] }}</h3>
                    <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ $value['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section id="team" class="mt-16" data-animate="fade-up">
        <div class="mb-8 text-center">
            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-primary">{{ __('messages.about.team_badge') }}</p>
            <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-4xl">
                {{ __('messages.about.team_title') }}
            </h2>
            <p class="mx-auto mt-3 max-w-2xl text-slate-600 dark:text-slate-400">
                {{ __('messages.about.team_desc') }}
            </p>
        </div>

        <div class="mx-auto grid max-w-4xl grid-cols-1 gap-8 md:grid-cols-2 lg:gap-14" data-stagger>
            @forelse ($team as $member)
                <div class="group relative aspect-[3/4] overflow-hidden rounded-[2rem] shadow-2xl transition-all duration-500 hover:-translate-y-3">
                    @if ($member->photo)
                        <!-- Background Image -->
                        <div class="absolute inset-0 bg-slate-200">
                            <div class="h-full w-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ $member->photo_url }}')"></div>
                        </div>
                    @else
                        <!-- Background Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $member->accent_class }}">
                            <div class="flex h-full w-full items-center justify-center pb-20">
                                <div class="rounded-full bg-white/20 p-10 backdrop-blur-sm">
                                    <span class="text-5xl font-black text-white">{{ $member->initial }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Gradient Overlay -->
                    <div class="team-card-gradient absolute inset-0 opacity-80 transition-opacity duration-500 group-hover:opacity-100"></div>
                    
                    <!-- Info Card with Glass Effect -->
                    <div class="glass-card absolute inset-x-5 bottom-5 transform rounded-[1.25rem] p-6 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <div class="flex flex-col">
                            <h3 class="mb-1 text-2xl font-black text-white">{{ $member->name }}</h3>
                            <p class="mb-3 text-xs font-bold uppercase tracking-widest text-blue-300">{{ $member->role }}</p>
                            
                            <!-- Expandable Content on Hover -->
                            <div class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 group-hover:max-h-40 group-hover:opacity-100">
                                @if ($member->bio)
                                    <p class="mb-4 border-t border-white/10 pt-3 text-sm leading-relaxed text-white/80">
                                        {{ Str::limit($member->bio, 100) }}
                                    </p>
                                @endif
                                
                                <!-- Social Links -->
                                <div class="flex gap-2">
                                    @if ($member->portfolio)
                                        <a href="{{ $member->portfolio }}" target="_blank" rel="noopener noreferrer" title="Portfolio" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-primary">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($member->linkedin)
                                        <a href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer" title="LinkedIn" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-primary">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($member->instagram)
                                        <a href="{{ $member->instagram }}" target="_blank" rel="noopener noreferrer" title="Instagram" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-primary">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($member->tiktok)
                                        <a href="{{ $member->tiktok }}" target="_blank" rel="noopener noreferrer" title="TikTok" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-primary">
                                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($member->email)
                                        <a href="mailto:{{ $member->email }}" title="Email" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-primary">
                                            <span class="material-symbols-outlined" style="font-size:14px">mail</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex rounded-xl bg-slate-100 p-4 text-slate-400 dark:bg-slate-800">
                        <span class="material-symbols-outlined !text-4xl">groups</span>
                    </div>
                    <p class="mt-4 text-slate-600 dark:text-slate-400">{{ __('messages.about.team_empty', ['default' => 'Tim kami sedang berkembang']) }}</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="mt-24 rounded-3xl bg-slate-900 px-8 py-20 text-center text-white dark:bg-slate-950" data-animate="zoom-in">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ __('messages.about.cta_title') }}</h2>
        <p class="mx-auto mb-10 max-w-xl text-lg text-slate-400">
            {{ __('messages.about.cta_desc') }}
        </p>
        <div class="flex flex-col justify-center gap-4 sm:flex-row">
            <a href="{{ route('contact') }}"
               class="rounded-xl bg-primary px-8 py-4 font-bold text-white shadow-xl shadow-primary/20 transition-all hover:bg-primary/90">
                {{ __('messages.about.cta_btn1') }}
            </a>
            <a href="{{ route('portfolio.index') }}"
               class="rounded-xl border border-white/20 bg-white/10 px-8 py-4 font-bold text-white transition-all hover:bg-white/20">
                {{ __('messages.about.cta_btn2') }}
            </a>
        </div>
    </section>
</section>
@endsection
