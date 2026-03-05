/**
 * Hero 3D Background - BandungCoding
 * Dibuat menggunakan Three.js untuk Animated 3D Background
 * Tema: Siluet gunung (Tangkuban Perahu) low-poly + Digital Network Flow
 */

const container = document.getElementById('canvas-container');
const isMobile = window.innerWidth < 768; // Deteksi perangkat mobile

// --- 1. SETUP SCENE ---
const scene = new THREE.Scene();
// Menggunakan fog putih agar ujung scene membaur halus dengan background #FFFFFF
scene.fog = new THREE.FogExp2(0xffffff, 0.02);

// --- 2. SETUP CAMERA ---
const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
camera.position.set(0, 5, 25);

// --- 3. SETUP RENDERER ---
const renderer = new THREE.WebGLRenderer({
    alpha: true, // Alpha true agar canvas transparan & bg CSS terlihat
    antialias: true,
    powerPreference: "high-performance"
});
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.setClearColor(0xffffff, 0); // Pastikan clear color transparan penuh
container.appendChild(renderer.domElement);

// --- 4. SETUP PENCAHAYAAN (LIGHTS) ---
const ambientLight = new THREE.AmbientLight(0xffffff, 0.9);
scene.add(ambientLight);
const directionalLight = new THREE.DirectionalLight(0xffffff, 0.6);
directionalLight.position.set(10, 20, 10);
scene.add(directionalLight);

// --- 5. TECH GRID FLOOR ---
// Membuat lantai grid transparan untuk memberi kesan digital/tech
const gridHelper = new THREE.GridHelper(150, 75, 0x0B3D91, 0x0B3D91);
gridHelper.position.y = -6;
gridHelper.material.opacity = 0.15;
gridHelper.material.transparent = true;
scene.add(gridHelper);

// --- 6. MESH GUNUNG (TEMA TANGKUBAN PERAHU) ---
// Membuat geometri bidang datar lalu memodifikasinya menjadi bentuk gunung perahu
const mountGeo = new THREE.PlaneGeometry(100, 50, 32, 16);
mountGeo.rotateX(-Math.PI / 2);

const pos = mountGeo.attributes.position;
for (let i = 0; i < pos.count; i++) {
    let x = pos.getX(i);
    let z = pos.getZ(i);

    // (x*x)/3 membuat elips lebih panjang secara horizontal (membentuk perahu)
    let dist = Math.sqrt((x * x) / 3 + z * z);
    let y = Math.max(-10, 15 - dist * 0.6); // Tinggi lereng

    // Meratakan puncaknya (Siluet perahu terbalik)
    if (y > 7) {
        y = 7 + Math.sin(x * 0.3) * 0.5; // Sedikit gelombang di puncaknya
    }

    // Menambahkan random noise untuk memunculkan efek low-poly
    y += (Math.random() - 0.5) * 1.5;
    pos.setY(i, y);
}
mountGeo.computeVertexNormals();

const mountMat = new THREE.MeshStandardMaterial({
    color: 0x0B3D91, // Navy Gelap
    flatShading: true, // Aktifkan flat shading untuk low poly look
    roughness: 0.8,
    metalness: 0.2
});
const mountain = new THREE.Mesh(mountGeo, mountMat);
mountain.position.set(0, -5, -30);
scene.add(mountain);

// Soft Blue Edge Glow (Wireframe/Edges)
const edges = new THREE.EdgesGeometry(mountGeo);
const edgeMat = new THREE.LineBasicMaterial({
    color: 0x4da8da,
    transparent: true,
    opacity: 0.5
});
const mountainEdges = new THREE.LineSegments(edges, edgeMat);
mountain.add(mountainEdges);

// --- 7. DIGITAL NETWORK NODES (PARTICLES + LINES) ---
let particles, lines, particlePositions;
// Kurangi partikel di mobile untuk performa
const particleCount = isMobile ? 30 : 70;
const maxDistance = 9;

const partGeo = new THREE.BufferGeometry();
particlePositions = new Float32Array(particleCount * 3);
const particleVelocities = [];

for (let i = 0; i < particleCount; i++) {
    // Posisi random
    particlePositions[i * 3] = (Math.random() - 0.5) * 60; // X
    particlePositions[i * 3 + 1] = Math.random() * 20 - 2; // Y
    particlePositions[i * 3 + 2] = (Math.random() - 0.5) * 40 - 10; // Z

    // Kecepatan random sangat lambat
    particleVelocities.push({
        x: (Math.random() - 0.5) * 0.015,
        y: (Math.random() - 0.5) * 0.015,
        z: (Math.random() - 0.5) * 0.015
    });
}

partGeo.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
const partMat = new THREE.PointsMaterial({
    color: 0x4da8da,
    size: 0.25,
    transparent: true,
    opacity: 0.8
});
particles = new THREE.Points(partGeo, partMat);
scene.add(particles);

// Geometri garis jaring-jaring
const lineMat = new THREE.LineBasicMaterial({
    color: 0x4da8da,
    transparent: true,
    opacity: 0.15
});
const lineGeo = new THREE.BufferGeometry();
lines = new THREE.LineSegments(lineGeo, lineMat);
// Nonaktifkan koneksi garis di mobile untuk save peforma rendering
if (!isMobile) scene.add(lines);

// --- 8. MOUSE PARALLAX & RESIZE EVENT ---
let mouseX = 0;
let mouseY = 0;
let targetX = 0;
let targetY = 0;

document.addEventListener('mousemove', (event) => {
    if (isMobile) return;
    mouseX = (event.clientX - window.innerWidth / 2);
    mouseY = (event.clientY - window.innerHeight / 2);
});

window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

// --- 9. ANIMASI AWAL (LOAD ANIMATION) ---
window.onload = () => {
    // Beri class loaded pada body dan canvas untuk memicu animasi CSS transisi
    document.body.classList.add('loaded');
    container.classList.add('loaded');

    // Animasi gunung muncul dari bawah secara perhalan
    mountain.position.y = -15;
    let p = 0;
    const animateMountainIn = () => {
        p += 0.015;
        mountain.position.y += (-5 - mountain.position.y) * 0.05;
        if (p < 1) requestAnimationFrame(animateMountainIn);
    };
    animateMountainIn();
};

// --- 10. ANIMATION LOOP UTAMA ---
function animate() {
    requestAnimationFrame(animate);

    // Grid Floor: Ilusi jalan maju dengan mereset z secara periodik
    gridHelper.position.z = (gridHelper.position.z + 0.015) % 10;

    // --- Update Particles & Network Line ---
    const positions = particles.geometry.attributes.position.array;
    let linePositions = [];

    for (let i = 0; i < particleCount; i++) {
        // Gerakan mengalir maju dan melayang
        positions[i * 3] += particleVelocities[i].x;
        positions[i * 3 + 1] += particleVelocities[i].y;
        positions[i * 3 + 2] += particleVelocities[i].z;

        // Pembatasan bounding box titik, jika keluar batas maka pantulkan balikan ke area
        if (positions[i * 3] < -35 || positions[i * 3] > 35) particleVelocities[i].x *= -1;
        if (positions[i * 3 + 1] < -2 || positions[i * 3 + 1] > 20) particleVelocities[i].y *= -1;
        if (positions[i * 3 + 2] < -30 || positions[i * 3 + 2] > 10) particleVelocities[i].z *= -1;

        // Perhitungan sambungan garis network antar titik yang berdekatan (Khusus desktop)
        if (!isMobile) {
            for (let j = i + 1; j < particleCount; j++) {
                const dx = positions[i * 3] - positions[j * 3];
                const dy = positions[i * 3 + 1] - positions[j * 3 + 1];
                const dz = positions[i * 3 + 2] - positions[j * 3 + 2];
                const distSq = dx * dx + dy * dy + dz * dz;

                // Jika titik dekat, sambungkan dengan garis
                if (distSq < maxDistance * maxDistance) {
                    linePositions.push(
                        positions[i * 3], positions[i * 3 + 1], positions[i * 3 + 2],
                        positions[j * 3], positions[j * 3 + 1], positions[j * 3 + 2]
                    );
                }
            }
        }
    }

    particles.geometry.attributes.position.needsUpdate = true;

    // Update attribute line agar interaktif realtime
    if (!isMobile) {
        lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
    }

    // --- Soft Camera Parallax Iteration ---
    if (!isMobile) {
        // Lakukan target posisi berdasarkan lokasi mouse sangat halus (0.001)
        targetX = mouseX * 0.001;
        targetY = mouseY * 0.001;
        camera.position.x += (targetX - camera.position.x) * 0.02;
        // Inverse sumbu Y dan di offset agar tetap look at the center object
        camera.position.y += (-targetY + 5 - camera.position.y) * 0.02;
        camera.lookAt(0, 5, -10);
    }

    renderer.render(scene, camera);
}

// Menjalankan the loop
animate();
