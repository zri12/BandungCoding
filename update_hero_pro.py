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
    z-index: 10;
}

/* Animations added */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
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

.animate-fade-in-up {
    animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    opacity: 0;
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
        <div class="inline-flex animate-fade-in-up items-center gap-2 rounded-full border border-blue-500/40 bg-blue-900/40 px-4 py-1.5 text-xs font-bold tracking-wider text-blue-300 backdrop-blur-md mb-8 shadow-[0_0_15px_rgba(59,130,246,0.3)]" style="animation-delay: 0.2s;">
            <span class="h-2 w-2 rounded-full bg-blue-400 shadow-[0_0_10px_#60a5fa] animate-pulse"></span>
            {!! __('messages.home.hero_badge') !!}
        </div>
        
        <!-- Typography -->
        <h2 class="mb-2 font-heritage text-3xl italic text-slate-300 md:text-4xl animate-fade-in-up" style="animation-delay: 0.4s;">{!! __('messages.home.hero_subtitle') !!}</h2>
        <h1 class="mb-6 text-6xl font-black leading-[1.1] text-white md:text-7xl lg:text-[5.5rem] tracking-tight animate-fade-in-up drop-shadow-2xl" style="animation-delay: 0.6s;">
            {!! __('messages.home.hero_title') !!}
        </h1>
        
        <p class="mx-auto mb-10 max-w-2xl text-base md:text-lg text-slate-300 animate-fade-in-up leading-relaxed drop-shadow-md" style="animation-delay: 0.8s;">
            {!! __('messages.home.hero_desc') !!}
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-fade-in-up" style="animation-delay: 1.0s;">
            <a href="{{ route('contact') }}" class="w-full sm:w-auto rounded-lg bg-blue-600 px-8 py-3.5 text-sm font-bold text-white transition-all hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(37,99,235,0.6)] hover:-translate-y-1 border border-blue-500">
                {!! __('messages.home.hero_start') !!}
            </a>
            <a href="{{ route('portfolio.index') }}" class="w-full sm:w-auto rounded-lg border border-slate-500 bg-slate-900/60 px-8 py-3.5 text-sm font-bold text-white backdrop-blur-md transition-all hover:border-blue-400 hover:bg-slate-800 hover:shadow-[0_0_15px_rgba(59,130,246,0.3)] hover:-translate-y-1">
                {!! __('messages.home.hero_portfolio') !!}
            </a>
        </div>
        
        <!-- Scroll Down -->
        <div class="flex flex-col items-center gap-2 text-[10px] font-bold tracking-[0.2em] text-slate-400 animate-fade-in-up mt-8" style="animation-delay: 1.2s;">
            {!! __('messages.home.hero_scroll') !!}
            <span class="material-symbols-outlined text-xl text-blue-400" style="animation: floatIcon 2s ease-in-out infinite;">keyboard_double_arrow_down</span>
        </div>
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
            <rect x="350" y="140" width="300" height="65" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
            <rect x="410" y="110" width="180" height="30" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
            <rect x="460" y="60" width="80" height="50" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
            <polygon points="492,60 500,20 508,60" fill="#0f172a" stroke="#1e3a8a" stroke-width="2"/>
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
"""

# Replace content safely
# Start from @push('styles'), which is around line 4.
# We will replace everything from line 4 up to where the next section begins (line 96 in the original or whatever was there).
# We can find the start and end by searching for the tokens.

start_idx = 0
end_idx = len(lines)

for i, line in enumerate(lines):
    if "@push('styles')" in line:
        start_idx = i
    if "<section class=\"bg-white py-20" in line:
        end_idx = i
        break

res = lines[:start_idx] + [new_content + '\n'] + lines[end_idx:]

with open(file_path, 'w', encoding='utf-8') as f:
    f.writelines(res)
