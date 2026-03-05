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

    $categoryLabel = $resolveCategoryLabel($blog->category);
    $excerpt = $blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $blog->content), 170);
    $plainContent = trim(strip_tags((string) $blog->content));
    $readMinutes = max(1, (int) ceil(str_word_count($plainContent) / 220));
    $heroImage = $blog->image ? asset($blog->image) : 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1600&q=80';
@endphp

<section class="mx-auto max-w-7xl px-4 pb-20 pt-32 sm:px-6 lg:pt-36" data-animate="fade-up">
    <nav class="mb-6 flex items-center gap-2 text-sm font-medium text-slate-500 dark:text-slate-400" aria-label="Breadcrumb">
        <a href="{{ route('home') }}" class="transition-colors hover:text-primary">{{ __('messages.blog.breadcrumb_home') }}</a>
        <span class="material-symbols-outlined !text-base">chevron_right</span>
        <a href="{{ route('blog.index') }}" class="transition-colors hover:text-primary">{{ __('messages.blog.breadcrumb_blog') }}</a>
        <span class="material-symbols-outlined !text-base">chevron_right</span>
        <span class="truncate text-slate-900 dark:text-slate-100">{{ \Illuminate\Support\Str::limit($blog->title, 44) }}</span>
    </nav>

    <header class="relative overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-br from-primary via-[#0a3a8a] to-[#0b1f4f] shadow-[0_24px_60px_rgba(11,61,147,0.25)]">
        <div class="pointer-events-none absolute inset-0 bg-cover bg-center opacity-25" style="background-image: url('{{ $heroImage }}');"></div>
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(255,255,255,0.15),transparent_45%)]"></div>
        <div class="relative z-10 px-6 py-10 text-white sm:px-8 lg:px-10 lg:py-12">
            <span class="mb-4 inline-flex items-center rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white/90">
                {{ $categoryLabel }}
            </span>
            <h1 class="max-w-4xl text-3xl font-black leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                {{ $blog->title }}
            </h1>
            <p class="mt-4 max-w-3xl text-sm leading-relaxed text-white/90 sm:text-base">
                {{ $excerpt }}
            </p>

            <div class="mt-6 flex flex-wrap items-center gap-3 text-xs font-semibold text-white/85 sm:text-sm">
                @if ($blog->author)
                    <span class="inline-flex items-center gap-1 rounded-full border border-white/20 bg-white/10 px-3 py-1">
                        <span class="material-symbols-outlined !text-base">person</span>
                        {{ __('messages.blog.detail_author') }}: {{ $blog->author }}
                    </span>
                @endif
                @if ($blog->published_at)
                    <span class="inline-flex items-center gap-1 rounded-full border border-white/20 bg-white/10 px-3 py-1">
                        <span class="material-symbols-outlined !text-base">calendar_month</span>
                        {{ __('messages.blog.detail_published') }}: {{ $blog->published_at->translatedFormat('d M Y') }}
                    </span>
                @endif
                <span class="inline-flex items-center gap-1 rounded-full border border-white/20 bg-white/10 px-3 py-1">
                    <span class="material-symbols-outlined !text-base">schedule</span>
                    {{ __('messages.blog.detail_read_time') }}: {{ $readMinutes }} {{ __('messages.blog.detail_read_time_suffix') }}
                </span>
            </div>
        </div>
    </header>

    <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-[minmax(0,1fr)_320px]">
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-8 lg:p-10">
            <div class="prose prose-slate max-w-none text-[15px] leading-relaxed prose-headings:tracking-tight prose-headings:text-slate-900 prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-img:rounded-2xl prose-img:shadow-sm dark:prose-invert dark:prose-headings:text-white sm:prose-lg">
                {!! $blog->content !!}
            </div>
        </article>

        <aside class="space-y-5 lg:sticky lg:top-28 lg:h-fit">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <h3 class="mb-3 text-lg font-bold text-slate-900 dark:text-slate-100">{{ __('messages.blog.detail_sidebar_title') }}</h3>
                <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.blog.detail_sidebar_desc') }}</p>
                <div class="mt-4 space-y-2 text-sm">
                    <div class="flex items-start justify-between gap-2">
                        <span class="text-slate-500 dark:text-slate-400">{{ __('messages.blog.categories_title') }}</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $categoryLabel }}</span>
                    </div>
                    @if ($blog->published_at)
                        <div class="flex items-start justify-between gap-2">
                            <span class="text-slate-500 dark:text-slate-400">{{ __('messages.blog.detail_published') }}</span>
                            <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $blog->published_at->translatedFormat('d M Y') }}</span>
                        </div>
                    @endif
                    <div class="flex items-start justify-between gap-2">
                        <span class="text-slate-500 dark:text-slate-400">{{ __('messages.blog.detail_read_time') }}</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-200">{{ $readMinutes }} {{ __('messages.blog.detail_read_time_suffix') }}</span>
                    </div>
                </div>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <h3 class="mb-3 text-lg font-bold text-slate-900 dark:text-slate-100">{{ __('messages.blog.detail_tags') }}</h3>
                @if ($blog->tags && count($blog->tags))
                    <div class="flex flex-wrap gap-2">
                        @foreach ($blog->tags as $tag)
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-800 dark:text-slate-300">
                                #{{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('messages.blog.detail_no_tags') }}</p>
                @endif
            </article>

            <article class="rounded-2xl bg-primary p-6 text-white shadow-lg shadow-primary/20">
                <h3 class="mb-2 text-lg font-bold">{{ __('messages.blog.detail_cta_title') }}</h3>
                <p class="mb-4 text-sm text-white/85">{{ __('messages.blog.detail_cta_desc') }}</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-primary transition-colors hover:bg-slate-100">
                    {{ __('messages.blog.detail_cta_btn') }}
                    <span class="material-symbols-outlined !text-base">arrow_forward</span>
                </a>
            </article>
        </aside>
    </div>

    <div class="mt-10">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-primary hover:text-primary dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
            <span class="material-symbols-outlined !text-base">arrow_back</span>
            {{ __('messages.blog.detail_back') }}
        </a>
    </div>
</section>
@endsection