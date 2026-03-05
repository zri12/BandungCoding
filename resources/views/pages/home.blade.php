@extends('layouts.app')

@section('content')
@php
    use App\Domain\Setting\Models\Setting;
    
    // Generate WhatsApp link for pricing buttons
    $whatsappNumber = Setting::getValue('whatsapp_number', '');
    $whatsappLink = Setting::getValue('whatsapp_link', '');
    
    if (empty($whatsappLink) && !empty($whatsappNumber)) {
        $cleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
        $whatsappLink = "https://wa.me/{$cleanNumber}?text=" . urlencode('Halo, saya tertarik dengan layanan BandungCoding. Saya ingin konsultasi tentang paket layanan yang tersedia.');
    }
    
    if (empty($whatsappLink)) {
        $whatsappLink = route('contact');
    }
@endphp
@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap');

.font-heritage {
    font-family: 'Playfair Display', serif;
}

.hero-bg {
    background-color: #020617;
    background-image: 
        radial-gradient(circle at 50% 50%, rgba(15, 23, 42, 0.4) 0%, rgba(2, 6, 23, 1) 100%);
    position: relative;
    overflow: hidden;
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

/* Unique Animations */
@keyframes badgeFadeGlow {
    0% { opacity: 0; transform: scale(0.8); box-shadow: 0 0 0px rgba(59, 130, 246, 0); }
    50% { box-shadow: 0 0 25px rgba(59, 130, 246, 0.6); }
    100% { opacity: 1; transform: scale(1); box-shadow: 0 0 15px rgba(59, 130, 246, 0.3); }
}

@keyframes subtitleSlideDown {
    0% { opacity: 0; transform: translateY(-30px) rotateX(15deg); }
    100% { opacity: 1; transform: translateY(0) rotateX(0deg); }
}

@keyframes titleBounceScale {
    0% { opacity: 0; transform: scale(0.7) translateY(40px); filter: blur(8px); }
    60% { transform: scale(1.05); }
    100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
}

@keyframes descriptionFadeSlide {
    0% { opacity: 0; transform: translateX(-30px); }
    100% { opacity: 1; transform: translateX(0); }
}

@keyframes buttonsPop {
    0% { opacity: 0; transform: scale(0.5) rotateY(45deg); }
    70% { transform: scale(1.1) rotateY(0deg); }
    100% { opacity: 1; transform: scale(1) rotateY(0deg); }
}

@keyframes scrollFloat {
    0% { opacity: 0; transform: translateY(40px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes pulseGlow {
    0%, 100% { opacity: 0.15; box-shadow: 0 0 30px rgba(59, 130, 246, 0.3); }
    50% { opacity: 0.4; box-shadow: 0 0 80px rgba(59, 130, 246, 0.8); }
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
@keyframes floatIcon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.animate-badge {
    animation: badgeFadeGlow 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) both;
}

.animate-subtitle {
    animation: subtitleSlideDown 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.animate-title {
    animation: titleBounceScale 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
}

.animate-description {
    animation: descriptionFadeSlide 0.85s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.animate-buttons {
    animation: buttonsPop 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) both;
}

.animate-scroll {
    animation: scrollFloat 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
}

#three-canvas-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: auto; /* Allow mouse interaction */
}

.hero-content {
    pointer-events: none; /* Let clicks pass through if needed */
}
.hero-content > * {
    pointer-events: auto; /* Buttons still clickable */
}

/* Marquee Animations */
@keyframes slide-infinite {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-slide-infinite {
    animation: slide-infinite 40s linear infinite;
    display: flex;
    white-space: nowrap;
}
.animate-slide-infinite:hover {
    animation-play-state: paused;
}
.client-logo {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 100px;
    min-width: 200px;
    padding: 16px 32px;
    filter: grayscale(100%) opacity(0.6);
    transition: all 0.4s ease;
    user-select: none;
    flex-shrink: 0;
}
.client-logo img {
    max-height: 48px;
    width: auto;
    max-width: 120px;
    object-fit: contain;
    display: block;
}
.client-logo:hover {
    filter: grayscale(0%) opacity(1);
    transform: scale(1.05);
}
</style>
@endpush

<section class="relative flex min-h-[100vh] items-center justify-center overflow-hidden hero-bg pt-20">
    <!-- Overlay gradasi tambahan agar teks selalu terbaca -->
    <div class="absolute inset-0 z-[1] bg-gradient-to-b from-slate-950/40 via-slate-950/20 to-slate-950/90 pointer-events-none"></div>

    <!-- 3D Canvas Container -->
    <div id="three-canvas-container"></div>

    <div class="hero-content relative z-10 mx-auto w-full max-w-5xl px-6 text-center mt-10">
        <!-- Glow effect behind text -->
        <div class="absolute left-1/2 top-1/2 -z-10 h-64 w-64 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-600/30 blur-[120px]" style="animation: pulseGlow 4s ease-in-out infinite;"></div>
        
        <!-- Badge -->
        <div class="inline-flex animate-badge items-center gap-2 rounded-full border border-blue-500/40 bg-blue-900/40 px-4 py-1.5 text-xs font-bold tracking-wider text-blue-300 backdrop-blur-md mb-8 shadow-[0_0_15px_rgba(59,130,246,0.3)]" style="animation-delay: 0s;">
            <span class="h-2 w-2 rounded-full bg-blue-400 shadow-[0_0_10px_#60a5fa] animate-pulse"></span>
            {!! __('messages.home.hero_badge') !!}
        </div>
        
        <!-- Typography -->
        <h2 class="mb-2 font-heritage text-2xl italic text-slate-300 md:text-3xl animate-subtitle" style="animation-delay: 0.15s;">{!! __('messages.home.hero_subtitle') !!}</h2>
        <h1 class="mb-6 text-5xl font-black leading-[1.1] text-white md:text-6xl lg:text-7xl tracking-tight animate-title drop-shadow-2xl" style="animation-delay: 0.3s;">
            {!! __('messages.home.hero_title') !!}
        </h1>
        
        <p class="mx-auto mb-10 max-w-2xl text-base md:text-lg text-slate-300 animate-description leading-relaxed drop-shadow-md" style="animation-delay: 0.5s;">
            {!! __('messages.home.hero_desc') !!}
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-buttons" style="animation-delay: 0.65s;">
            <a href="{{ route('contact') }}" class="w-full sm:w-auto rounded-lg bg-blue-600 px-8 py-3.5 text-sm font-bold text-white transition-all hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(37,99,235,0.6)] hover:-translate-y-1 border border-blue-500">
                {!! __('messages.home.hero_start') !!}
            </a>
            <a href="{{ route('portfolio.index') }}#portfolio-grid" class="w-full sm:w-auto rounded-lg border border-slate-500 bg-slate-900/60 px-8 py-3.5 text-sm font-bold text-white backdrop-blur-md transition-all hover:border-blue-400 hover:bg-slate-800 hover:shadow-[0_0_15px_rgba(59,130,246,0.3)] hover:-translate-y-1">
                {!! __('messages.home.hero_portfolio') !!}
            </a>
        </div>
        
        <!-- Scroll Down -->
        <button onclick="document.getElementById('features-section').scrollIntoView({ behavior: 'smooth' })" class="mx-auto flex flex-col items-center gap-2 text-[10px] font-bold tracking-[0.2em] text-slate-400 animate-scroll mt-8 hover:text-blue-400 transition-colors cursor-pointer" style="animation-delay: 0.8s;">
            {!! __('messages.home.hero_scroll') !!}
            <span class="material-symbols-outlined text-xl text-blue-400" style="animation: floatIcon 2s ease-in-out infinite;">keyboard_double_arrow_down</span>
        </button>
    </div>

    <!-- Gedung Sate Silhouette SVG -->
    <div class="gedung-sate-silhouette flex justify-center items-end opacity-90">
        <svg viewBox="0 0 1000 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" preserveAspectRatio="xMidYMax slice">
            <!-- Glow background -->
            <rect x="350" y="50" width="300" height="150" fill="#2563eb" opacity="0.15" filter="blur(20px)" />
            
            <!-- Tech grid lines -->
            <path d="M 400 200 L 400 150 M 450 200 L 450 150 M 500 200 L 500 150 M 550 200 L 550 150 M 600 200 L 600 150" stroke="#1e3a8a" stroke-width="1" opacity="0.5"/>
            <path d="M 350 190 L 650 190 M 350 180 L 650 180 M 350 170 L 650 170 M 350 160 L 650 160" stroke="#1e3a8a" stroke-width="1" opacity="0.5"/>

            <!-- Curved network lines -->
            <path d="M 0 200 Q 250 140 400 150" stroke="#3b82f6" stroke-width="2" fill="none" class="animate-pulse" style="animation-duration: 2s;box-shadow: 0 0 10px #3b82f6;"/>
            <path d="M 1000 200 Q 750 140 600 150" stroke="#3b82f6" stroke-width="2" fill="none" class="animate-pulse" style="animation-duration: 3s;box-shadow: 0 0 10px #3b82f6;"/>
            
            <!-- Nodes -->
            <circle cx="400" cy="150" r="4" fill="#60a5fa" class="animate-ping" style="animation-duration: 2s;"/>
            <circle cx="600" cy="150" r="4" fill="#60a5fa" class="animate-ping" style="animation-duration: 3s;"/>
            <circle cx="500" cy="20" r="6" fill="#bfdbfe" class="animate-pulse" style="animation-duration: 1.5s;"/>

            <!-- Building Silhouette -->
            <g transform="translate(350, 40) scale(0.6)">
                <!-- Base -->
                <rect x="50" y="240" width="400" height="40" fill="#020617" stroke="#1e3a8a" stroke-width="4"/>
                <!-- 5 Pillars Window Cutouts -->
                <rect x="80" y="240" width="40" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
                <rect x="150" y="240" width="40" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
                <rect x="220" y="240" width="40" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
                <rect x="290" y="240" width="40" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
                <rect x="360" y="240" width="40" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>

                <!-- Bottom Roof -->
                <path d="M 10 240 L 490 240 L 410 170 L 90 170 Z" fill="#020617" stroke="#1e3a8a" stroke-width="4" stroke-linejoin="round"/>
                
                <!-- Middle Roof -->
                <path d="M 70 170 L 430 170 L 360 110 L 140 110 Z" fill="#020617" stroke="#1e3a8a" stroke-width="4" stroke-linejoin="round"/>

                <!-- Top Roof -->
                <path d="M 120 110 L 380 110 L 290 50 L 210 50 Z" fill="#020617" stroke="#1e3a8a" stroke-width="4" stroke-linejoin="round"/>

                <!-- Spire Base -->
                <path d="M 230 50 L 270 50 L 255 20 L 245 20 Z" fill="#020617" stroke="#1e3a8a" stroke-width="2" stroke-linejoin="round"/>

                <!-- 4 Satay Skewers -->
                <circle cx="250" cy="15" r="8" fill="#020617" stroke="#1e3a8a" stroke-width="2"/>
                <circle cx="250" cy="-2" r="8" fill="#020617" stroke="#1e3a8a" stroke-width="2"/>
                <circle cx="250" cy="-19" r="8" fill="#020617" stroke="#1e3a8a" stroke-width="2"/>
                <circle cx="250" cy="-36" r="8" fill="#020617" stroke="#1e3a8a" stroke-width="2"/>
                <path d="M 248 -44 L 252 -44 L 250 -60 Z" fill="#1e3a8a"/>
            </g>
        </svg>
    </div>
</section>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // === NAVBAR SCROLL EFFECT ===
    const navbar = document.getElementById('main-navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-md', 'bg-white/95', 'dark:bg-slate-950/95');
                navbar.classList.remove('bg-white/80', 'dark:bg-slate-950/80');
            } else {
                navbar.classList.add('bg-white/80', 'dark:bg-slate-950/80');
                navbar.classList.remove('shadow-md', 'bg-white/95', 'dark:bg-slate-950/95');
            }
        });
    }

    // === THREE.JS ADVANCED NETWORK HERO ===
    const container = document.getElementById('three-canvas-container');
    if (!container) return;
    
    // Scene setup
    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x020617, 0.002);
    
    // Camera setup
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 100;
    camera.position.y = 20;
    
    // Renderer setup
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0); // Transparent background
    container.appendChild(renderer.domElement);
    
    // Resize handler
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
    
    // Particles (Nodes)
    const particleCount = window.innerWidth < 768 ? 200 : 500;
    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    const velocities = [];
    
    for (let i = 0; i < particleCount; i++) {
        // Spread particles in a wide area
        positions[i * 3] = (Math.random() - 0.5) * 400; // x
        positions[i * 3 + 1] = (Math.random() - 0.5) * 200 + 50; // y
        positions[i * 3 + 2] = (Math.random() - 0.5) * 300 - 50; // z
        
        velocities.push({
            x: (Math.random() - 0.5) * 0.2,
            y: (Math.random() - 0.5) * 0.2,
            z: (Math.random() - 0.5) * 0.2
        });
    }
    
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    
    // Create soft glowing material for particles
    const particleMaterial = new THREE.PointsMaterial({
        color: 0x60a5fa,
        size: 1.5,
        transparent: true,
        opacity: 0.8,
        blending: THREE.AdditiveBlending
    });
    
    const particles = new THREE.Points(geometry, particleMaterial);
    scene.add(particles);
    
    // Lines connecting nearby particles
    const lineMaterial = new THREE.LineBasicMaterial({
        color: 0x2563eb,
        transparent: true,
        opacity: 0.15,
        blending: THREE.AdditiveBlending
    });
    
    const lineGeometry = new THREE.BufferGeometry();
    const lineMesh = new THREE.LineSegments(lineGeometry, lineMaterial);
    scene.add(lineMesh);
    
    // IT Grid Floor
    const gridHelper = new THREE.GridHelper(400, 100, 0x1e3a8a, 0x1e3a8a);
    gridHelper.position.y = -50;
    gridHelper.material.opacity = 0.2;
    gridHelper.material.transparent = true;
    gridHelper.material.blending = THREE.AdditiveBlending;
    scene.add(gridHelper);
    
    // Mouse Interaction
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;
    
    const windowHalfX = window.innerWidth / 2;
    const windowHalfY = window.innerHeight / 2;
    
    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX - windowHalfX);
        mouseY = (event.clientY - windowHalfY);
    });
    
    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        
        // Move Grid to simulate forward movement
        gridHelper.position.z = (gridHelper.position.z + 0.5) % 4;
        
        const positions = particles.geometry.attributes.position.array;
        
        // Update particle positions
        for (let i = 0; i < particleCount; i++) {
            positions[i * 3] += velocities[i].x;
            positions[i * 3 + 1] += velocities[i].y;
            positions[i * 3 + 2] += velocities[i].z;
            
            // Bounce off boundaries
            if (positions[i * 3] > 200 || positions[i * 3] < -200) velocities[i].x *= -1;
            if (positions[i * 3 + 1] > 200 || positions[i * 3 + 1] < -50) velocities[i].y *= -1;
            if (positions[i * 3 + 2] > 100 || positions[i * 3 + 2] < -300) velocities[i].z *= -1;
        }
        
        particles.geometry.attributes.position.needsUpdate = true;
        
        // Connect nearby particles with lines (calculate every frame)
        // To optimize, only connect a subset or use distance thresholds carefully
        const linePositions = [];
        let connections = 0;
        
        for (let i = 0; i < particleCount; i++) {
            for (let j = i + 1; j < particleCount; j++) {
                const dx = positions[i * 3] - positions[j * 3];
                const dy = positions[i * 3 + 1] - positions[j * 3 + 1];
                const dz = positions[i * 3 + 2] - positions[j * 3 + 2];
                const distSq = dx*dx + dy*dy + dz*dz;
                
                // If particles are close, draw a line
                if (distSq < 1500 && connections < 2000) {
                    linePositions.push(
                        positions[i * 3], positions[i * 3 + 1], positions[i * 3 + 2],
                        positions[j * 3], positions[j * 3 + 1], positions[j * 3 + 2]
                    );
                    connections++;
                }
            }
        }
        
        lineMesh.geometry.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
        
        // Camera smooth movement based on mouse
        targetX = mouseX * 0.05;
        targetY = mouseY * 0.05;
        
        camera.position.x += (targetX - camera.position.x) * 0.02;
        camera.position.y += (-targetY + 20 - camera.position.y) * 0.02;
        camera.lookAt(scene.position);
        
        // Slowly rotate scene
        scene.rotation.y += 0.001;
        
        renderer.render(scene, camera);
    }
    
    animate();
});
</script>
@endpush

<section id="features-section" class="bg-white py-20 dark:bg-background-dark/50" data-animate="fade-up">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
<div class="mb-14 text-center">
<h2 class="text-4xl font-black text-slate-800 dark:text-white lg:text-5xl mb-3 tracking-tight">{{ __('messages.home.value_title') }}</h2>
<h3 class="text-lg font-medium text-slate-500 dark:text-slate-400">{{ __('messages.home.value_subtitle') }}</h3>
</div>
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" data-stagger>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">language</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_1_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_1_desc') }}</p>
</div>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">palette</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_2_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_2_desc') }}</p>
</div>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">sms</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_3_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_3_desc') }}</p>
</div>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">smartphone</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_4_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_4_desc') }}</p>
</div>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">bolt</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_5_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_5_desc') }}</p>
</div>
<div class="flex flex-col gap-3 rounded-[24px] bg-slate-50 p-8 transition-all hover:bg-slate-100 dark:bg-slate-800/50 dark:hover:bg-slate-800">
    <div class="mb-2 text-blue-700 dark:text-blue-400">
        <span class="material-symbols-outlined text-[32px] leading-none">check_circle</span>
    </div>
    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100 tracking-tight">{{ __('messages.home.value_6_title') }}</h4>
    <p class="text-[15px] leading-relaxed text-slate-500 dark:text-slate-400">{{ __('messages.home.value_6_desc') }}</p>
</div>
</div>
</section>

<!-- Klien Kami Section -->
<section class="bg-white py-16 dark:bg-slate-900/50" data-animate="fade-up">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10 text-center mb-10">
        <h2 class="text-3xl font-black text-slate-900 dark:text-white">{{ __('messages.home.client_subtitle') }}</h2>
        <p class="mt-2 text-slate-600 dark:text-slate-400">{{ __('messages.home.client_desc') }}</p>
    </div>
    
    <div class="relative overflow-hidden w-full">
        <!-- Gradient overlays for smooth fading effect at edges -->
        <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-32 bg-gradient-to-r from-white to-transparent dark:from-slate-900/50"></div>
        <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-32 bg-gradient-to-l from-white to-transparent dark:from-slate-900/50"></div>
        
        <!-- Single track: two identical halves for seamless infinite loop -->
        <!-- Each half repeats items 4x so it always exceeds viewport width -->
        <div class="animate-slide-infinite flex items-center">
            @foreach([1,2] as $half)
            @foreach([1,2,3,4,5,6] as $rep)
            @foreach($clients as $client)
            <div class="client-logo" @if($half === 2) aria-hidden="true" @endif>
                <div class="flex flex-col items-center gap-2 w-full">
                    @if($client->logo)
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-12 w-auto max-w-[140px] object-contain">
                    @endif
                    <div class="text-sm font-bold text-slate-700 dark:text-slate-200 text-center whitespace-nowrap">{{ $client->name }}</div>
                </div>
            </div>
            @endforeach
            @endforeach
            @endforeach
        </div>
    </div>
</section>
<section class="py-24" data-animate="fade-up">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
@php
    $serviceIconMap = [
        'globe' => 'language',
        'device-mobile' => 'smartphone',
        'palette' => 'palette',
        'code' => 'deployed_code',
        'light-bulb' => 'lightbulb',
        'cloud' => 'cloud',
    ];
    $serviceImageMap = [
        'web-development' => asset('images/gambar-web.png'),
        'mobile-app-development' => asset('images/gambar-apps.png'),
        'ui-ux-design' => asset('images/gambar-marketing.png'),
    ];
    $serviceTitleMap = [
        'web-development' => __('messages.home.service_1_title'),
        'mobile-app-development' => __('messages.home.service_2_title'),
        'ui-ux-design' => __('messages.home.service_3_title'),
    ];
@endphp
<div class="mb-14 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
<div class="max-w-3xl">
<h2 class="text-sm font-bold uppercase tracking-widest text-primary dark:text-sky-300">{{ __('messages.home.service_subtitle') }}</h2>
<h3 class="mt-2 text-4xl font-black leading-tight tracking-tight text-slate-900 dark:text-white lg:text-5xl">{{ __('messages.home.service_title') }}</h3>
</div>
<a class="group inline-flex items-center gap-2 rounded-xl border border-primary/20 bg-white px-5 py-3 font-bold text-primary transition-all hover:border-primary hover:bg-primary hover:text-white dark:bg-slate-700 dark:border-slate-500 dark:text-white dark:hover:bg-primary dark:hover:border-primary" href="{{ route('layanan.index') }}">
                            {{ __('messages.home.service_all') }}
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 gap-7 md:grid-cols-2 xl:grid-cols-3" data-stagger>
@forelse($services->take(3) as $service)
@php
    $cardImage = $service->image ? asset($service->image) : ($serviceImageMap[$service->slug] ?? 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80');
    $cardIcon = $serviceIconMap[$service->icon] ?? 'deployed_code';
    $cardTitle = $serviceTitleMap[$service->slug] ?? $service->title;
@endphp
<article class="group flex h-full flex-col overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_10px_30px_rgba(15,23,42,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(11,61,147,0.16)] dark:border-slate-600 dark:bg-slate-700">
<div class="relative aspect-[4/3] overflow-hidden">
<img class="block h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-105" src="{{ $cardImage }}" alt="{{ $cardTitle }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-slate-900/35 via-slate-900/5 to-transparent"></div>
<div class="absolute left-5 top-5 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-white/90 text-primary shadow-lg backdrop-blur-sm dark:bg-slate-900/85">
<span class="material-symbols-outlined">{{ $cardIcon }}</span>
</div>
</div>
<div class="flex flex-1 flex-col p-6 lg:p-7">
<h4 class="text-[2.05rem] font-black leading-[1.05] tracking-tight text-slate-900 dark:text-white">{{ $cardTitle }}</h4>
<p class="mt-4 text-[1.05rem] leading-relaxed text-slate-600 dark:text-slate-400">{{ \Illuminate\Support\Str::limit($service->excerpt, 95) }}</p>
<a href="{{ route('layanan.show', $service->slug) }}" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-primary dark:text-sky-400 transition-all hover:gap-3">
{{ __('messages.services.detail_btn') }}
<span class="material-symbols-outlined !text-base">arrow_forward</span>
</a>
</div>
</article>
@empty
<p class="col-span-full text-center text-slate-400">{{ __('messages.services.empty_title') }}</p>
@endforelse
</div>
</div>
</section>
<section class="py-20 bg-slate-50 dark:bg-slate-900/30" data-animate="fade-up">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
<div class="mb-16 text-center">
<h2 class="text-sm font-bold uppercase tracking-widest text-primary dark:text-sky-300">{{ __('messages.home.pricing_subtitle') }}</h2>
<h3 class="mt-2 text-3xl font-black text-slate-900 dark:text-white lg:text-4xl">{{ __('messages.home.pricing_title') }}</h3>
<p class="mx-auto mt-4 max-w-2xl text-slate-600 dark:text-slate-400">{{ __('messages.home.pricing_desc') }}</p>
</div>
<div class="grid grid-cols-1 gap-8 md:grid-cols-3" data-stagger>
<div class="flex flex-col rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200 transition-all hover:shadow-xl dark:bg-slate-700 dark:ring-slate-500">
<div class="mb-8">
<h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('messages.home.pricing_1_title') }}</h4>
<div class="mt-4 flex flex-col gap-1">
<span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ __('messages.home.pricing_1_prefix') }}</span>
<div class="flex items-baseline gap-1">
<span class="text-3xl font-black text-slate-900 dark:text-white">{{ __('messages.home.pricing_1_price') }}</span>
<span class="text-sm text-slate-500 dark:text-slate-400">{{ __('messages.home.pricing_project') }}</span>
</div>
</div>
<p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('messages.home.pricing_1_desc') }}</p>
</div>
<ul class="mb-8 flex flex-1 flex-col gap-4 text-sm text-slate-600 dark:text-slate-400">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_1_f1') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_1_f2') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_1_f3') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_1_f4') }}
                                </li>
</ul>
<a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="text-center w-full rounded-xl border border-primary/20 bg-white py-3 text-sm font-bold text-primary transition-all hover:bg-primary hover:text-white dark:bg-slate-600 dark:border-slate-400 dark:text-white">
                                {{ __('messages.home.pricing_select') }}
                            </a>
</div>
<div class="relative flex flex-col rounded-3xl bg-white p-8 shadow-2xl ring-2 ring-primary transition-all hover:-translate-y-2 dark:bg-slate-700">
<div class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-primary px-4 py-1 text-xs font-bold uppercase tracking-wider text-white">
                                {{ __('messages.home.pricing_2_badge') }}
                            </div>
<div class="absolute inset-0 -z-10 rounded-3xl bg-primary/5 blur-2xl"></div>
<div class="mb-8">
<h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('messages.home.pricing_2_title') }}</h4>
<div class="mt-4 flex flex-col gap-1">
<span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ __('messages.home.pricing_2_prefix') }}</span>
<div class="flex items-baseline gap-1">
<span class="text-3xl font-black text-slate-900 dark:text-white">{{ __('messages.home.pricing_2_price') }}</span>
<span class="text-sm text-slate-500 dark:text-slate-400">{{ __('messages.home.pricing_project') }}</span>
</div>
</div>
<p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('messages.home.pricing_2_desc') }}</p>
</div>
<ul class="mb-8 flex flex-1 flex-col gap-4 text-sm text-slate-600 dark:text-slate-400">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_2_f1') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_2_f2') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_2_f3') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_2_f4') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_2_f5') }}
                                </li>
</ul>
<a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="text-center w-full rounded-xl bg-primary py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 transition-all hover:bg-primary/90">
                                {{ __('messages.home.pricing_select') }}
                            </a>
</div>
<div class="flex flex-col rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200 transition-all hover:shadow-xl dark:bg-slate-700 dark:ring-slate-500">
<div class="mb-8">
<h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('messages.home.pricing_3_title') }}</h4>
<div class="mt-4 flex items-baseline gap-1">
<span class="text-3xl font-black text-slate-900 dark:text-white">Custom</span>
</div>
<p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('messages.home.pricing_3_desc') }}</p>
</div>
<ul class="mb-8 flex flex-1 flex-col gap-4 text-sm text-slate-600 dark:text-slate-400">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_3_f1') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_3_f2') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_3_f3') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_3_f4') }}
                                </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary font-bold">check</span>
                                    {{ __('messages.home.pricing_3_f5') }}
                                </li>
</ul>
<a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="text-center w-full rounded-xl border border-primary/20 bg-white py-3 text-sm font-bold text-primary transition-all hover:bg-primary hover:text-white dark:bg-slate-600 dark:border-slate-400 dark:text-white">
                                {{ __('messages.home.pricing_select') }}
                            </a>
</div>
</div>
</div>
</section>
<section class="bg-primary py-20" data-animate="zoom-in">
<div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-10">
<h2 class="text-3xl font-black text-white lg:text-5xl">{{ __('messages.home.cta_title') }}</h2>
<p class="mx-auto mt-6 max-w-2xl text-lg text-white/80">
                        {{ __('messages.home.cta_desc') }}
                    </p>
<div class="mt-10 flex flex-wrap justify-center gap-4">
<a href="{{ route('contact') }}" class="rounded-xl bg-white px-8 py-4 text-lg font-bold text-primary shadow-xl transition-all hover:scale-105">
                            {{ __('messages.home.cta_btn1') }}
                        </a>
<a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-8 py-4 text-lg font-bold text-white transition-all hover:bg-white/20">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 shrink-0"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            {{ __('messages.home.cta_btn2') }}
                        </a>
</div>
</div>
</section>
@endsection
