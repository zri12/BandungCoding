{{-- Komponen Blog Card --}}
{{-- Card artikel blog dengan tampilan modern untuk halaman Home & Blog --}}
@props(['blog'])

@php
    $rawCategory = trim((string) ($blog->category ?? ''));
    $categoryMap = [
        'teknologi' => __('messages.blog.category_technology'),
        'technology' => __('messages.blog.category_technology'),
        'development' => __('messages.blog.category_development'),
        'digital marketing' => __('messages.blog.category_digital_marketing'),
    ];

    if ($rawCategory === '') {
        $categoryLabel = __('messages.blog.category_general');
    } elseif (\Illuminate\Support\Str::startsWith($rawCategory, 'messages.')) {
        $categoryLabel = __($rawCategory);
    } else {
        $categoryLabel = $categoryMap[\Illuminate\Support\Str::lower($rawCategory)] ?? $rawCategory;
    }

    $excerpt = $blog->excerpt ?: strip_tags((string) $blog->content);
@endphp

<article class="group flex h-full flex-col overflow-hidden rounded-xl border border-slate-200/80 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/10 dark:border-slate-700 dark:bg-slate-900 sm:rounded-2xl">
    <a href="{{ route('blog.show', $blog->slug) }}" class="relative block aspect-[3/2] overflow-hidden bg-slate-200 dark:bg-slate-800 sm:aspect-[16/11]">
        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="{{ $blog->title }}"
                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                 loading="lazy">
        @else
            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-300 via-slate-200 to-slate-100 dark:from-slate-700 dark:via-slate-800 dark:to-slate-900">
                <span class="material-symbols-outlined text-6xl text-slate-400 dark:text-slate-500 sm:text-7xl">article</span>
            </div>
        @endif
        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/50 to-black/0 sm:h-24"></div>
    </a>

    <div class="flex flex-1 flex-col p-3.5 sm:p-4 md:p-5 lg:p-6">
        <div class="mb-2 flex flex-wrap items-center gap-2 sm:mb-2.5">
            <span class="inline-flex shrink-0 items-center rounded-full bg-primary/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-primary dark:bg-primary/20 dark:text-blue-300 sm:px-2.5 sm:py-1 sm:text-[11px]">
                {{ $categoryLabel }}
            </span>
            @if ($blog->published_at)
                <time datetime="{{ $blog->published_at->format('Y-m-d') }}" class="text-[11px] font-medium text-slate-500 dark:text-slate-400 sm:text-xs">
                    {{ $blog->published_at->translatedFormat('d M Y') }}
                </time>
            @endif
            @if ($blog->author)
                <span class="text-slate-300 dark:text-slate-600">|</span>
                <span class="truncate text-[11px] font-medium text-slate-500 dark:text-slate-400 sm:text-xs">{{ $blog->author }}</span>
            @endif
        </div>

        <h3 class="mb-2 line-clamp-2 text-base font-extrabold leading-tight text-slate-900 transition-colors group-hover:text-primary dark:text-slate-100 sm:mb-2.5 sm:text-lg sm:leading-snug md:text-xl">
            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
        </h3>

        <p class="mb-3 line-clamp-2 text-xs leading-relaxed text-slate-600 dark:text-slate-400 sm:mb-4 sm:line-clamp-3 sm:text-sm">
            {{ \Illuminate\Support\Str::limit($excerpt, 120) }}
        </p>

        <a href="{{ route('blog.show', $blog->slug) }}"
           class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold text-primary transition-all hover:gap-2.5 sm:gap-2 sm:text-sm sm:hover:gap-3">
            {{ __('messages.blog.read_more') }}
            <span class="material-symbols-outlined !text-sm sm:!text-base">arrow_forward</span>
        </a>
    </div>
</article>