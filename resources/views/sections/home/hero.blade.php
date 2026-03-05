{{-- Section: Hero Home --}}
{{-- Hero utama landing page dengan CTA dan statistik --}}

<section class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50 py-20 lg:py-32">
    {{-- Background Decoration --}}
    <div class="absolute top-0 right-0 -z-10 w-1/2 h-full opacity-30">
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-200 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-40 w-56 h-56 bg-indigo-200 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- Kiri: Text --}}
            <div>
                <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 text-sm font-medium rounded-full mb-6">
                    {{ __('messages.home.hero_section_badge') }}
                </span>
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-extrabold text-slate-800 leading-tight tracking-tight">
                    Bangun Produk
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                        Digital Terbaik
                    </span>
                    Bersama Kami
                </h1>
                <p class="mt-6 text-lg text-slate-500 leading-relaxed max-w-lg">
                    {{ \App\Domain\Setting\Models\Setting::getValue('company_tagline', config('bandungcoding.company.tagline')) }}.
                    {{ __('messages.home.hero_section_desc') }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center px-7 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/40 transform hover:-translate-y-0.5 transition-all duration-200">
                        {{ __('messages.home.hero_section_start_btn') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('portfolio.index') }}"
                       class="inline-flex items-center px-7 py-3.5 bg-white text-slate-700 font-semibold rounded-xl border border-slate-200 hover:border-blue-300 hover:text-blue-600 transition-all duration-200">
                        {{ __('messages.home.portfolio_all') }}
                    </a>
                </div>

                {{-- Stats --}}
                <div class="mt-12 flex items-center space-x-8 lg:space-x-12">
                    <div>
                        <p class="text-3xl font-bold text-slate-800">50+</p>
                        <p class="text-sm text-slate-500">{{ __('messages.home.hero_stat_1_title') }}</p>
                    </div>
                    <div class="w-px h-12 bg-slate-200"></div>
                    <div>
                        <p class="text-3xl font-bold text-slate-800">30+</p>
                        <p class="text-sm text-slate-500">{{ __('messages.home.hero_stat_2_title') }}</p>
                    </div>
                    <div class="w-px h-12 bg-slate-200"></div>
                    <div>
                        <p class="text-3xl font-bold text-slate-800">5+</p>
                        <p class="text-sm text-slate-500">{{ __('messages.home.hero_stat_3_title') }}</p>
                    </div>
                </div>
            </div>

            {{-- Kanan: Visual --}}
            <div class="hidden lg:flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl rotate-6 opacity-20"></div>
                    <div class="absolute inset-0 w-80 h-80 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl -rotate-3 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-20 h-20 mx-auto mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            <p class="text-xl font-bold">{{ \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding')) }}</p>
                            <p class="text-sm text-blue-200 mt-1">Software House</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
