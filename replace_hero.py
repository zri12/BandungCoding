import sys
file_path = 'resources/views/pages/home.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_content = """@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap');

.font-heritage {
    font-family: 'Playfair Display', serif;
}

.hero-bg {
    background-color: #020617;
    background-image: 
        radial-gradient(circle at 50% 50%, rgba(15, 23, 42, 0.4) 0%, rgba(2, 6, 23, 1) 100%),
        url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=2070');
    background-size: cover, cover;
    background-position: center, center;
    background-blend-mode: overlay, normal;
}

.gedung-sate-silhouette {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    max-width: 600px;
    height: auto;
    pointer-events: none;
}
</style>
@endpush

<section class="relative flex min-h-screen items-center justify-center overflow-hidden hero-bg pt-20">
    <!-- Overlay gradasi tambahan -->
    <div class="absolute inset-0 z-0 bg-slate-950/80"></div>

    <div class="relative z-10 mx-auto w-full max-w-4xl px-6 text-center">
        <!-- Badge -->
        <div class="inline-flex animate-slide-up items-center gap-2 rounded-full border border-blue-500/30 bg-blue-900/30 px-4 py-1.5 text-xs font-bold tracking-wider text-blue-400 backdrop-blur-md mb-8">
            <span class="h-1.5 w-1.5 rounded-full bg-blue-500 shadow-[0_0_8px_#3b82f6] animate-pulse"></span>
            {!! __('messages.home.hero_badge') !!}
        </div>
        
        <!-- Typography -->
        <h2 class="mb-2 font-heritage text-3xl italic text-slate-300 md:text-4xl animate-slide-up" style="animation-delay: 0.1s">{!! __('messages.home.hero_subtitle') !!}</h2>
        <h1 class="mb-6 text-6xl font-black leading-[1.1] text-white md:text-7xl lg:text-[5.5rem] tracking-tight animate-slide-up" style="animation-delay: 0.2s">
            {!! __('messages.home.hero_title') !!}
        </h1>
        
        <p class="mx-auto mb-10 max-w-2xl text-base md:text-lg text-slate-400 animate-slide-up leading-relaxed" style="animation-delay: 0.3s">
            {!! __('messages.home.hero_desc') !!}
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-slide-up" style="animation-delay: 0.4s">
            <a href="{{ route('contact') }}" class="w-full sm:w-auto rounded-lg bg-blue-600 px-8 py-3.5 text-sm font-bold text-white transition-all hover:bg-blue-500 hover:shadow-[0_0_20px_rgba(37,99,235,0.4)]">
                {!! __('messages.home.hero_start') !!}
            </a>
            <a href="{{ route('portfolio.index') }}" class="w-full sm:w-auto rounded-lg border border-slate-600 bg-slate-900/50 px-8 py-3.5 text-sm font-bold text-white backdrop-blur-sm transition-all hover:border-slate-400 hover:bg-slate-800">
                {!! __('messages.home.hero_portfolio') !!}
            </a>
        </div>
        
        <!-- Scroll Down -->
        <div class="flex flex-col items-center gap-2 text-[10px] font-bold tracking-[0.2em] text-slate-500 animate-fade-in" style="animation-delay: 0.8s">
            {!! __('messages.home.hero_scroll') !!}
            <span class="material-symbols-outlined text-md animate-bounce">keyboard_arrow_down</span>
        </div>
    </div>

    <!-- Gedung Sate Silhouette SVG -->
    <div class="gedung-sate-silhouette z-0 flex justify-center items-end h-[150px]">
        <svg width="240" height="150" viewBox="0 0 240 150" fill="none" xmlns="http://www.w3.org/2000/svg" class="block">
            <rect x="0" y="130" width="240" height="20" fill="#020617"/>
            <rect x="20" y="110" width="200" height="20" fill="#020617"/>
            <rect x="50" y="90" width="140" height="20" fill="#020617"/>
            <rect x="80" y="70" width="80" height="20" fill="#020617"/>
            <rect x="100" y="40" width="40" height="30" fill="#020617"/>
            <rect x="110" y="20" width="20" height="20" fill="#020617"/>
            <rect x="118" y="0" width="4" height="20" fill="#020617"/>
            <circle cx="120" cy="4" r="3" fill="#3b82f6" class="animate-pulse"/>
        </svg>
    </div>
</section>"""

res = lines[:3] + [new_content + '\n'] + lines[310:]

with open(file_path, 'w', encoding='utf-8') as f:
    f.writelines(res)
