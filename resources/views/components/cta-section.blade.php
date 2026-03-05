{{-- Komponen CTA Section --}}
{{-- Call-to-action section dengan gradient background --}}
@props([
    'title' => 'Siap Memulai Proyek Anda?',
    'subtitle' => 'Hubungi kami sekarang untuk konsultasi gratis dan wujudkan ide Anda.',
])

<section class="py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 rounded-3xl px-8 py-16 lg:px-16 lg:py-20 text-center">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full"></div>
            </div>

            <div class="relative">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4 tracking-tight">
                    {{ $title }}
                </h2>
                <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                    {{ $subtitle }}
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    Hubungi Kami
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
