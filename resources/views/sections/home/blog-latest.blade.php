{{-- Section: Blog Latest --}}
{{-- Artikel blog terbaru di halaman Home --}}

<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading
            title="{{ __('messages.home.blog_title') }}"
            subtitle="{{ __('messages.home.blog_subtitle') }}"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse ($blogs as $blog)
                <x-blog-card :blog="$blog" />
            @empty
                <p class="col-span-full text-center text-slate-400">{{ __('messages.home.blog_empty') }}</p>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('blog.index') }}"
               class="inline-flex items-center px-6 py-3 border border-slate-200 text-slate-600 font-medium rounded-xl hover:border-blue-300 hover:text-blue-600 transition-all">
                {{ __('messages.home.blog_all') }}
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>
