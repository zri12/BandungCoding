@extends('layouts.app')

@section('content')
@php
    $resolveCategoryLabel = function (?string $category): string {
        $category = trim((string) $category);
        $categoryMap = [
            'teknologi' => __('messages.blog.category_technology'),
            'technology' => __('messages.blog.category_technology'),
            'development' => __('messages.blog.category_development'),
            'digital marketing' => __('messages.blog.category_digital_marketing'),
        ];

        if ($category === '') {
            return __('messages.blog.category_general');
        }

        if (\Illuminate\Support\Str::startsWith($category, 'messages.')) {
            return __($category);
        }

        return $categoryMap[\Illuminate\Support\Str::lower($category)] ?? $category;
    };
@endphp

<section class="mx-auto max-w-7xl px-4 pb-20 pt-28 sm:px-6 sm:pt-32 lg:pt-36" data-animate="fade-up">
    <div class="relative mb-8 overflow-hidden rounded-2xl border border-primary/20 bg-gradient-to-br from-primary via-[#0a3a8a] to-[#0b1f4f] px-5 py-8 text-white shadow-[0_20px_50px_rgba(11,61,147,0.25)] sm:mb-12 sm:rounded-3xl sm:px-8 sm:py-10 lg:px-12 lg:py-14">
        <div class="pointer-events-none absolute -right-14 -top-14 h-44 w-44 rounded-full bg-white/10 blur-2xl"></div>
        <div class="pointer-events-none absolute -left-12 bottom-4 h-36 w-36 rounded-full bg-blue-300/20 blur-2xl"></div>

        <div class="relative z-10">
            <p class="mb-2.5 inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-widest text-white/90 sm:mb-3 sm:px-4 sm:text-xs">
                {{ __('messages.blog.kicker') }}
            </p>
            <h1 class="mb-3 max-w-3xl text-3xl font-black tracking-tight sm:text-4xl sm:mb-4 md:text-5xl lg:text-6xl">
                {{ __('messages.blog.hero_title') }}
            </h1>
            <p class="max-w-3xl text-sm leading-relaxed text-white/90 sm:text-base md:text-lg">
                {{ __('messages.blog.hero_desc') }}
            </p>

            <div class="mt-6 grid grid-cols-1 gap-2.5 sm:mt-8 sm:grid-cols-3 sm:gap-3">
                <div class="rounded-xl border border-white/20 bg-white/10 px-3.5 py-2.5 backdrop-blur-sm sm:rounded-2xl sm:px-4 sm:py-3">
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-white/70 sm:text-xs">{{ __('messages.blog.stats_articles') }}</p>
                    <p class="mt-0.5 text-xl font-extrabold sm:mt-1 sm:text-2xl">{{ number_format($totalBlogs ?? 0) }}</p>
                </div>
                <div class="rounded-xl border border-white/20 bg-white/10 px-3.5 py-2.5 backdrop-blur-sm sm:rounded-2xl sm:px-4 sm:py-3">
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-white/70 sm:text-xs">{{ __('messages.blog.stats_categories') }}</p>
                    <p class="mt-0.5 text-xl font-extrabold sm:mt-1 sm:text-2xl">{{ number_format($totalCategories ?? 0) }}</p>
                </div>
                <div class="rounded-xl border border-white/20 bg-white/10 px-3.5 py-2.5 backdrop-blur-sm sm:rounded-2xl sm:px-4 sm:py-3">
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-white/70 sm:text-xs">{{ __('messages.blog.stats_updated') }}</p>
                    <p class="mt-0.5 text-xl font-extrabold sm:mt-1 sm:text-2xl">
                        @if (!empty($latestPublished))
                            {{ $latestPublished->translatedFormat('d M Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-[minmax(0,1fr)_340px] lg:gap-10">
        <div>
            @if($blogs->count())
                <div class="grid grid-cols-1 gap-5 sm:gap-6 md:grid-cols-2 md:gap-8" data-stagger>
                    @foreach ($blogs as $blog)
                        <x-blog-card :blog="$blog" />
                    @endforeach
                </div>
            @else
                <div class="rounded-xl border border-slate-200 bg-white px-5 py-10 text-center dark:border-slate-700 dark:bg-slate-900 sm:rounded-2xl sm:px-6 sm:py-14">
                    <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 sm:mb-4 sm:h-16 sm:w-16">
                        <span class="material-symbols-outlined text-2xl text-slate-400 sm:text-3xl">article</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100 sm:text-xl">{{ __('messages.blog.empty_title') }}</h3>
                    <p class="mt-1.5 text-sm text-slate-500 dark:text-slate-400 sm:mt-2">{{ __('messages.blog.empty_desc') }}</p>
                </div>
            @endif

            @if($blogs->hasPages())
                <div class="mt-8 sm:mt-10 lg:mt-12">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>

        <aside class="mt-8 space-y-4 sm:space-y-5 lg:mt-0 lg:space-y-6 lg:sticky lg:top-28 lg:h-fit">
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:rounded-2xl sm:p-5 lg:p-6">
                <h3 class="mb-3 text-base font-bold text-slate-900 dark:text-slate-100 sm:mb-4 sm:text-lg">{{ __('messages.blog.search_title') }}</h3>
                <label class="relative block">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input type="text"
                           class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-3 text-sm text-slate-700 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200"
                           placeholder="{{ __('messages.blog.search_ph') }}">
                </label>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:rounded-2xl sm:p-5 lg:p-6">
                <h3 class="mb-3 text-base font-bold text-slate-900 dark:text-slate-100 sm:mb-4 sm:text-lg">{{ __('messages.blog.categories_title') }}</h3>
                <ul class="space-y-2">
                    @forelse(($categoryCounts ?? collect()) as $category => $count)
                        <li>
                            <div class="flex items-center justify-between rounded-xl border border-transparent px-3 py-2 transition-colors hover:border-primary/20 hover:bg-primary/5">
                                <span class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $resolveCategoryLabel($category) }}</span>
                                <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-bold text-slate-500 dark:bg-slate-800 dark:text-slate-300">
                                    {{ str_pad((string) $count, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                        </li>
                    @empty
                        <li class="text-sm text-slate-500 dark:text-slate-400">{{ __('messages.blog.categories_empty') }}</li>
                    @endforelse
                </ul>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:rounded-2xl sm:p-5 lg:p-6">
                <h3 class="mb-3 text-base font-bold text-slate-900 dark:text-slate-100 sm:mb-4 sm:text-lg">{{ __('messages.blog.recent_title') }}</h3>
                <div class="space-y-4">
                    @forelse(($recentBlogs ?? collect()) as $recentBlog)
                        <a href="{{ route('blog.show', $recentBlog->slug) }}" class="group flex gap-2.5 sm:gap-3">
                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-lg bg-slate-200 dark:bg-slate-800 sm:h-16 sm:w-16">
                                @if ($recentBlog->image)
                                    <img src="{{ asset($recentBlog->image) }}" alt="{{ $recentBlog->title }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-400">image</span>
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold uppercase tracking-wider text-primary">
                                    {{ $resolveCategoryLabel($recentBlog->category) }}
                                </p>
                                <h4 class="line-clamp-2 text-sm font-bold leading-snug text-slate-800 transition-colors group-hover:text-primary dark:text-slate-100">
                                    {{ $recentBlog->title }}
                                </h4>
                                @if ($recentBlog->published_at)
                                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">{{ $recentBlog->published_at->translatedFormat('d M Y') }}</p>
                                @endif
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('messages.blog.recent_empty') }}</p>
                    @endforelse
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-primary p-4 text-white shadow-lg shadow-primary/20 sm:rounded-2xl sm:p-5 lg:p-6">
                <div class="relative z-10">
                    <h3 class="mb-2 text-base font-bold sm:text-lg">{{ __('messages.blog.newsletter_title') }}</h3>
                    <p class="mb-4 text-sm text-white/85">{{ __('messages.blog.newsletter_desc') }}</p>
                    <div class="space-y-2">
                        <input type="email"
                               class="w-full rounded-xl border border-white/20 bg-white/10 px-3 py-2.5 text-sm text-white placeholder:text-white/65 focus:border-white/35 focus:outline-none"
                               placeholder="{{ __('messages.blog.newsletter_ph') }}">
                        <button class="w-full rounded-xl bg-white px-3 py-2.5 text-sm font-bold text-primary transition-colors hover:bg-slate-100">
                            {{ __('messages.blog.newsletter_btn') }}
                        </button>
                    </div>
                </div>
                <span class="material-symbols-outlined pointer-events-none absolute -bottom-4 -right-4 text-[88px] text-white/15">mail</span>
            </div>
        </aside>
    </div>
</section>
@endsection
