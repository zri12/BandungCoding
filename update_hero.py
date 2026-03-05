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
    bottom: -1px;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    min-width: 1000px;
    height: auto;
    pointer-events: none;
    z-index: 0;
}

/* Animations added */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes pulseGlow {
    0%, 100% { opacity: 0.1; box-shadow: 0 0 20px rgba(59, 130, 246, 0.2); }
    50% { opacity: 0.3; box-shadow: 0 0 50px rgba(59, 130, 246, 0.6); }
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.animate-fade-in-up {
    animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    opacity: 0;
}
</style>
@endpush

<section class="relative flex min-h-screen items-center justify-center overflow-hidden hero-bg pt-20">
    <!-- Overlay gradasi tambahan -->
    <div class="absolute inset-0 z-0 bg-slate-950/80"></div>

    <!-- Canvas for IT Network Animation -->
    <canvas id="hero-network-canvas" class="absolute inset-0 z-0 opacity-60 pointer-events-none"></canvas>

    <div class="relative z-10 mx-auto w-full max-w-5xl px-6 text-center">
        <!-- Glow effect behind text -->
        <div class="absolute left-1/2 top-1/2 -z-10 h-64 w-64 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-600/20 blur-[100px]" style="animation: pulseGlow 4s ease-in-out infinite;"></div>
        
        <!-- Badge -->
        <div class="inline-flex animate-fade-in-up items-center gap-2 rounded-full border border-blue-500/30 bg-blue-900/30 px-4 py-1.5 text-xs font-bold tracking-wider text-blue-400 backdrop-blur-md mb-8" style="animation-delay: 0.2s;">
            <span class="h-1.5 w-1.5 rounded-full bg-blue-500 shadow-[0_0_8px_#3b82f6] animate-pulse"></span>
            {!! __('messages.home.hero_badge') !!}
        </div>
        
        <!-- Typography -->
        <h2 class="mb-2 font-heritage text-3xl italic text-slate-300 md:text-4xl animate-fade-in-up" style="animation-delay: 0.4s;">{!! __('messages.home.hero_subtitle') !!}</h2>
        <h1 class="mb-6 text-6xl font-black leading-[1.1] text-white md:text-7xl lg:text-[5.5rem] tracking-tight animate-fade-in-up" style="animation-delay: 0.6s;">
            {!! __('messages.home.hero_title') !!}
        </h1>
        
        <p class="mx-auto mb-10 max-w-2xl text-base md:text-lg text-slate-400 animate-fade-in-up leading-relaxed" style="animation-delay: 0.8s;">
            {!! __('messages.home.hero_desc') !!}
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-fade-in-up" style="animation-delay: 1.0s;">
            <a href="{{ route('contact') }}" class="w-full sm:w-auto rounded-lg bg-blue-600 px-8 py-3.5 text-sm font-bold text-white transition-all hover:bg-blue-500 hover:shadow-[0_0_20px_rgba(37,99,235,0.4)]">
                {!! __('messages.home.hero_start') !!}
            </a>
            <a href="{{ route('portfolio.index') }}" class="w-full sm:w-auto rounded-lg border border-slate-600 bg-slate-900/50 px-8 py-3.5 text-sm font-bold text-white backdrop-blur-sm transition-all hover:border-slate-400 hover:bg-slate-800">
                {!! __('messages.home.hero_portfolio') !!}
            </a>
        </div>
        
        <!-- Scroll Down -->
        <div class="flex flex-col items-center gap-2 text-[10px] font-bold tracking-[0.2em] text-slate-500 animate-fade-in-up" style="animation-delay: 1.2s;">
            {!! __('messages.home.hero_scroll') !!}
            <span class="material-symbols-outlined text-md" style="animation: float 2s ease-in-out infinite;">keyboard_arrow_down</span>
        </div>
    </div>

    <!-- Gedung Sate Silhouette SVG -->
    <div class="gedung-sate-silhouette flex justify-center items-end opacity-90">
        <svg viewBox="0 0 1000 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" preserveAspectRatio="xMidYMax slice">
            <!-- Glow background -->
            <rect x="400" y="50" width="200" height="150" fill="#3b82f6" opacity="0.05" />
            
            <!-- Curved network lines -->
            <path d="M 0 200 Q 250 140 400 150" stroke="#1e3a8a" stroke-width="2" fill="none" class="animate-pulse" style="animation-duration: 3s;"/>
            <path d="M 1000 200 Q 750 140 600 150" stroke="#1e3a8a" stroke-width="2" fill="none" class="animate-pulse" style="animation-duration: 4s;"/>
            
            <path d="M 0 220 Q 300 160 420 170" stroke="#1e3a8a" stroke-width="1" opacity="0.5" fill="none" />
            <path d="M 1000 220 Q 700 160 580 170" stroke="#1e3a8a" stroke-width="1" opacity="0.5" fill="none" />

            <!-- Building Silhouette -->
            <rect x="350" y="140" width="300" height="65" fill="#1e293b"/>
            <rect x="410" y="110" width="180" height="30" fill="#1e293b"/>
            <rect x="460" y="60" width="80" height="50" fill="#1e293b"/>
            <rect x="492" y="20" width="16" height="40" fill="#1e293b"/>
        </svg>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('hero-network-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let width, height;
    let particles = [];
    
    const initCanvas = () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    };
    
    window.addEventListener('resize', initCanvas);
    initCanvas();
    
    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.vx = (Math.random() - 0.5) * 0.5;
            this.vy = (Math.random() - 0.5) * 0.5;
            this.radius = Math.random() * 1.5 + 0.5;
            this.baseAlpha = Math.random() * 0.5 + 0.1;
        }
        
        update() {
            this.x += this.vx;
            this.y += this.vy;
            
            if (this.x < 0 || this.x > width) this.vx *= -1;
            if (this.y < 0 || this.y > height) this.vy *= -1;
        }
        
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(59, 130, 246, ${this.baseAlpha})`;
            ctx.fill();
        }
    }
    
    // Create particles
    const particleCount = window.innerWidth < 768 ? 40 : 100;
    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }
    
    // Gedung Sate coordinate (bottom center)
    const buildingX = width / 2;
    const buildingY = height;
    
    function animate() {
        ctx.clearRect(0, 0, width, height);
        
        particles.forEach((p, index) => {
            p.update();
            p.draw();
            
            // Connect nearby particles
            for (let j = index + 1; j < particles.length; j++) {
                const p2 = particles[j];
                const dx = p.x - p2.x;
                const dy = p.y - p2.y;
                const dist = Math.sqrt(dx*dx + dy*dy);
                
                if (dist < 120) {
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.strokeStyle = `rgba(59, 130, 246, ${0.15 * (1 - dist/120)})`;
                    ctx.stroke();
                }
            }
            
            // Occasionally connect particles to 'Gedung Sate' (bottom center)
            const dbx = p.x - buildingX;
            const dby = p.y - buildingY + 150; // Approximating top of building
            const distB = Math.sqrt(dbx*dbx + dby*dby);
            if (distB < 300) {
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(buildingX, buildingY - 100);
                ctx.strokeStyle = `rgba(59, 130, 246, ${0.1 * (1 - distB/300)})`;
                ctx.stroke();
            }
        });
        
        requestAnimationFrame(animate);
    }
    
    animate();
});
</script>
@endpush
"""

res = lines[:3] + [new_content + '\n'] + lines[94:]

with open(file_path, 'w', encoding='utf-8') as f:
    f.writelines(res)
