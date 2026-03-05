@extends('layouts.app')

@section('content')
@php
    $iconMap = [
        'globe' => 'language',
        'device-mobile' => 'smartphone',
        'palette' => 'palette',
        'code' => 'deployed_code',
        'light-bulb' => 'lightbulb',
        'cloud' => 'cloud',
    ];

    $defaultHighlights = [
        __('messages.services.highlight_default_1'),
        __('messages.services.highlight_default_2'),
        __('messages.services.highlight_default_3'),
    ];

    $serviceHighlights = [
        'web-development' => [
            __('messages.services.highlight_web_1'),
            __('messages.services.highlight_web_2'),
            __('messages.services.highlight_web_3'),
        ],
        'mobile-app-development' => [
            __('messages.services.highlight_mobile_1'),
            __('messages.services.highlight_mobile_2'),
            __('messages.services.highlight_mobile_3'),
        ],
        'ui-ux-design' => [
            __('messages.services.highlight_uiux_1'),
            __('messages.services.highlight_uiux_2'),
            __('messages.services.highlight_uiux_3'),
        ],
        'custom-software' => [
            __('messages.services.highlight_software_1'),
            __('messages.services.highlight_software_2'),
            __('messages.services.highlight_software_3'),
        ],
        'it-consulting' => [
            __('messages.services.highlight_consulting_1'),
            __('messages.services.highlight_consulting_2'),
            __('messages.services.highlight_consulting_3'),
        ],
        'devops-cloud' => [
            __('messages.services.highlight_devops_1'),
            __('messages.services.highlight_devops_2'),
            __('messages.services.highlight_devops_3'),
        ],
    ];

    $serviceCount = $services->count();
@endphp

<section class="mx-auto max-w-7xl px-4 pb-20 pt-32 sm:px-6 lg:pt-36" data-animate="fade-up">
    <section class="relative overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-br from-primary via-[#0a3a8a] to-[#0b1f4f] px-8 py-12 text-white shadow-[0_24px_60px_rgba(11,61,147,0.25)] lg:px-12 lg:py-16">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_12%_15%,rgba(255,255,255,0.18),transparent_45%)]"></div>
        <div class="pointer-events-none absolute inset-0 opacity-20" style="background-image:url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1400&q=80'); background-size:cover; background-position:center;"></div>
        <div class="pointer-events-none absolute -right-10 -bottom-16 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 max-w-3xl">
            <p class="mb-4 inline-flex rounded-full border border-white/25 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-white/85">
                {{ __('messages.services.hero_badge') }}
            </p>
            <h1 class="mb-5 text-4xl font-black leading-tight tracking-tight md:text-5xl lg:text-6xl">
                {{ __('messages.services.hero_title') }}
            </h1>
            <p class="mb-8 max-w-2xl text-base leading-relaxed text-white/90 md:text-lg">
                {{ __('messages.services.hero_desc') }}
            </p>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3 text-sm font-bold text-primary transition-all hover:bg-slate-100">
                    {{ __('messages.services.hero_cta_primary') }}
                </a>
                <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center rounded-xl border border-white/30 bg-white/10 px-6 py-3 text-sm font-bold text-white transition-all hover:bg-white/20">
                    {{ __('messages.services.hero_cta_secondary') }}
                </a>
            </div>
        </div>
    </section>

    <section class="mt-8 grid grid-cols-2 gap-4 md:grid-cols-4" data-animate="fade-up" data-delay="200">
        <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <p class="text-2xl font-black text-slate-900 dark:text-slate-100">{{ $serviceCount }}+</p>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('messages.services.stats_services') }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <p class="text-2xl font-black text-slate-900 dark:text-slate-100">24/7</p>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('messages.services.stats_support') }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <p class="text-2xl font-black text-slate-900 dark:text-slate-100">100+</p>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('messages.services.stats_projects') }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <p class="text-2xl font-black text-slate-900 dark:text-slate-100">4</p>
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('messages.services.stats_process') }}</p>
        </article>
    </section>

    <section class="mt-16" data-animate="fade-up">
        <div class="mb-8 text-center">
            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-primary">{{ __('messages.services.list_badge') }}</p>
            <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-4xl">{{ __('messages.services.list_title') }}</h2>
            <p class="mx-auto mt-3 max-w-2xl text-slate-600 dark:text-slate-400">{{ __('messages.services.list_desc') }}</p>
        </div>

        <div class="space-y-8">
            @forelse ($services as $index => $service)
                @php
                    $isOdd = $index % 2 === 1;
                    $icon = $iconMap[$service->icon] ?? 'deployed_code';
                    $highlights = $serviceHighlights[$service->slug] ?? $defaultHighlights;
                    $description = $service->description ? \Illuminate\Support\Str::limit(strip_tags($service->description), 220) : $service->excerpt;
                @endphp

                <article class="grid grid-cols-1 items-center gap-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900 lg:grid-cols-[1.15fr_0.85fr] lg:p-8 {{ $isOdd ? 'lg:[&>*:first-child]:order-2 lg:[&>*:last-child]:order-1' : '' }}">
                    <div>
                        <p class="mb-3 inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                            {{ __('messages.services.service_label') }} {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <h3 class="mb-3 text-2xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-3xl">{{ $service->title }}</h3>
                        <p class="mb-4 text-base leading-relaxed text-slate-600 dark:text-slate-400">{{ $service->excerpt }}</p>
                        <p class="mb-6 text-sm leading-relaxed text-slate-500 dark:text-slate-400">{{ $description }}</p>

                        <div class="mb-6 grid grid-cols-1 gap-2 sm:grid-cols-3">
                            @foreach ($highlights as $item)
                                <span class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                    <span class="material-symbols-outlined !text-base text-primary">check_circle</span>
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>

                        <a href="{{ route('layanan.show', $service->slug) }}" class="inline-flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white transition-all hover:bg-primary/90">
                            {{ __('messages.services.detail_btn') }}
                            <span class="material-symbols-outlined !text-base">arrow_forward</span>
                        </a>
                    </div>

                    <div class="relative overflow-hidden rounded-2xl border border-primary/20 bg-gradient-to-br from-primary/15 via-blue-100/80 to-white p-8 dark:from-primary/20 dark:via-slate-800 dark:to-slate-900">
                        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-primary/20 blur-2xl"></div>
                        <div class="relative z-10">
                            <div class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-primary text-white shadow-lg shadow-primary/25">
                                <span class="material-symbols-outlined text-3xl">{{ $icon }}</span>
                            </div>
                            <h4 class="mb-2 text-lg font-bold text-slate-900 dark:text-slate-100">{{ __('messages.services.card_outcome_title') }}</h4>
                            <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.services.card_outcome_desc') }}</p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-14 text-center dark:border-slate-700 dark:bg-slate-900">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800">
                        <span class="material-symbols-outlined text-3xl text-slate-400">construction</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">{{ __('messages.services.empty_title') }}</h3>
                    <p class="mt-2 text-slate-500 dark:text-slate-400">{{ __('messages.services.empty_desc') }}</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="mt-16 rounded-3xl border border-slate-200 bg-slate-50/80 p-8 dark:border-slate-700 dark:bg-slate-900/40 lg:p-10" data-animate="fade-up">
        <div class="mb-8 text-center">
            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-primary">{{ __('messages.services.process_badge') }}</p>
            <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100 lg:text-4xl">{{ __('messages.services.process_title') }}</h2>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            @for ($step = 1; $step <= 4; $step++)
                <article class="rounded-2xl border border-slate-200 bg-white p-5 dark:border-slate-700 dark:bg-slate-900">
                    <p class="mb-3 text-xs font-bold uppercase tracking-widest text-primary">{{ __('messages.services.process_step') }} {{ $step }}</p>
                    <h3 class="mb-2 text-base font-bold text-slate-900 dark:text-slate-100">{{ __('messages.services.process_' . $step . '_title') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.services.process_' . $step . '_desc') }}</p>
                </article>
            @endfor
        </div>
    </section>

    <section class="mt-16" data-animate="fade-up">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-slate-100">{{ __('messages.services.faq_title') }}</h2>
            <p class="mt-2 text-slate-600 dark:text-slate-400">{{ __('messages.services.faq_desc') }}</p>
        </div>

        <div class="space-y-4">
            @for ($faq = 1; $faq <= 3; $faq++)
                <article class="rounded-2xl border border-slate-200 bg-white p-6 dark:border-slate-700 dark:bg-slate-900">
                    <h3 class="mb-2 text-lg font-bold text-slate-900 dark:text-slate-100">{{ __('messages.services.faq_' . $faq . '_q') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.services.faq_' . $faq . '_a') }}</p>
                </article>
            @endfor
        </div>
    </section>

    <section class="mt-24 rounded-3xl bg-slate-900 px-8 py-20 text-center text-white dark:bg-slate-950" data-animate="zoom-in">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ __('messages.services.cta_title') }}</h2>
        <p class="mx-auto mb-10 max-w-xl text-lg text-slate-400">
            {{ __('messages.services.cta_desc') }}
        </p>
        <div class="flex flex-col justify-center gap-4 sm:flex-row">
            <a href="{{ route('contact') }}"
               class="rounded-xl bg-primary px-8 py-4 font-bold text-white shadow-xl shadow-primary/20 transition-all hover:bg-primary/90">
                {{ __('messages.services.cta_btn1') }}
            </a>
            <a href="{{ route('portfolio.index') }}"
               class="rounded-xl border border-white/20 bg-white/10 px-8 py-4 font-bold text-white transition-all hover:bg-white/20">
                {{ __('messages.services.cta_btn2') }}
            </a>
        </div>
    </section>
</section>
@endsection
