<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Admin' }} - Admin {{ \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding')) }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    @php
        $faviconPath = \App\Domain\Setting\Models\Setting::getValue('logo_favicon');
    @endphp
    @if ($faviconPath)
        <link rel="icon" href="{{ asset('storage/' . $faviconPath) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Cropper.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    @stack('styles')
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-[280px_minmax(0,1fr)]">
        <aside class="hidden border-r border-slate-200 bg-slate-950 text-slate-100 lg:flex lg:flex-col sticky top-0 h-screen overflow-y-auto">
            <div class="border-b border-slate-800 px-6 py-6">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">Admin Panel</p>
                <h1 class="mt-2 text-2xl font-extrabold tracking-tight">{{ \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding')) }}</h1>
            </div>

            <nav class="flex-1 space-y-1 px-4 py-6 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('admin.layanan.index') }}" class="{{ request()->routeIs('admin.layanan.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">construction</span>
                    Layanan
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="{{ request()->routeIs('admin.portfolio.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">work</span>
                    Portfolio
                </a>
                <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">article</span>
                    Blog
                </a>
                <a href="{{ route('admin.klien.index') }}" class="{{ request()->routeIs('admin.klien.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">business</span>
                    Klien
                </a>
                <a href="{{ route('admin.tim.index') }}" class="{{ request()->routeIs('admin.tim.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">groups</span>
                    Tim
                </a>
                <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">mail</span>
                    Pesan Kontak
                </a>
                <a href="{{ route('admin.pengaturan.index') }}" class="{{ request()->routeIs('admin.pengaturan.*') ? 'bg-primary/20 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} flex items-center gap-2 rounded-xl px-3 py-2.5 font-medium transition-colors">
                    <span class="material-symbols-outlined !text-base">settings</span>
                    Pengaturan
                </a>
            </nav>

            <div class="border-t border-slate-800 px-6 py-5 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-slate-900 transition-colors hover:bg-slate-200">
                    <span class="material-symbols-outlined !text-base">open_in_new</span>
                    Lihat Website
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-700 px-4 py-2.5 text-sm font-semibold text-slate-400 transition-colors hover:border-rose-500 hover:text-rose-400">
                        <span class="material-symbols-outlined !text-base">logout</span>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="min-h-screen">
            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 px-4 py-3 backdrop-blur sm:px-6 lg:px-10">
                <div class="mx-auto max-w-7xl">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-bold tracking-tight text-slate-900 sm:text-xl">{{ $pageTitle ?? 'Dashboard Admin' }}</h2>
                            <p class="text-xs text-slate-500 sm:text-sm">{{ $pageSubtitle ?? 'Kelola konten website ' . \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding')) . ' dari satu dashboard.' }}</p>
                        </div>
                        <a href="{{ route('home') }}" target="_blank" class="hidden items-center gap-2 rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 transition-colors hover:border-primary hover:text-primary sm:inline-flex">
                            <span class="material-symbols-outlined !text-base">open_in_new</span>
                            Buka Website
                        </a>
                    </div>

                    <details class="mt-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 lg:hidden">
                        <summary class="cursor-pointer list-none text-sm font-semibold text-slate-700">Menu Admin</summary>
                        <nav class="mt-3 grid grid-cols-2 gap-2 text-xs font-semibold">
                            <a href="{{ route('admin.dashboard') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-slate-700' }}">Dashboard</a>
                            <a href="{{ route('admin.layanan.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.layanan.*') ? 'text-primary' : 'text-slate-700' }}">Layanan</a>
                            <a href="{{ route('admin.portfolio.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.portfolio.*') ? 'text-primary' : 'text-slate-700' }}">Portfolio</a>
                            <a href="{{ route('admin.blog.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.blog.*') ? 'text-primary' : 'text-slate-700' }}">Blog</a>
                            <a href="{{ route('admin.klien.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.klien.*') ? 'text-primary' : 'text-slate-700' }}">Klien</a>
                            <a href="{{ route('admin.tim.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.tim.*') ? 'text-primary' : 'text-slate-700' }}">Tim</a>
                            <a href="{{ route('admin.kontak.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.kontak.*') ? 'text-primary' : 'text-slate-700' }}">Kontak</a>
                            <a href="{{ route('admin.pengaturan.index') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-center {{ request()->routeIs('admin.pengaturan.*') ? 'text-primary' : 'text-slate-700' }}">Pengaturan</a>
                        </nav>
                    </details>
                </div>
            </header>

            <section class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-10 lg:py-8">
                @if (session('success'))
                    <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                        <p class="font-semibold">Terdapat input yang perlu diperbaiki:</p>
                        <ul class="mt-1 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </section>
        </main>
    </div>

    @stack('scripts')

    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

    {{-- Image Crop Modal --}}
    <div id="cropperModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/75 p-4 backdrop-blur-sm">
        <div class="flex w-full max-w-2xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl">
            {{-- Header --}}
            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Crop Gambar</h3>
                    <p id="cropperRatioLabel" class="mt-0.5 text-xs text-slate-500"></p>
                </div>
                <button type="button" onclick="closeCropper()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>
            {{-- Crop Area --}}
            <div class="flex items-center justify-center bg-slate-900" style="max-height:60vh;overflow:hidden;">
                <img id="cropperImage" src="" alt="Crop" style="display:block;max-width:100%;">
            </div>
            {{-- Controls --}}
            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-slate-200 bg-slate-50 px-5 py-3">
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span class="material-symbols-outlined !text-sm">touch_app</span>
                    Drag: geser &nbsp;|&nbsp;
                    <span class="material-symbols-outlined !text-sm">zoom_in</span>
                    Scroll: zoom &nbsp;|&nbsp;
                    <span class="material-symbols-outlined !text-sm">crop</span>
                    Sudut: resize
                </div>
                <div class="flex gap-2">
                    <div class="flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-1">
                        <button type="button" onclick="cropperRotate(-90)" title="Putar Kiri" class="flex h-8 w-8 items-center justify-center rounded text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                            <span class="material-symbols-outlined !text-sm">rotate_left</span>
                        </button>
                        <button type="button" onclick="cropperRotate(90)" title="Putar Kanan" class="flex h-8 w-8 items-center justify-center rounded text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                            <span class="material-symbols-outlined !text-sm">rotate_right</span>
                        </button>
                        <button type="button" onclick="cropperFlip('x')" title="Flip Horizontal" class="flex h-8 w-8 items-center justify-center rounded text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                            <span class="material-symbols-outlined !text-sm">flip</span>
                        </button>
                        <button type="button" onclick="cropperReset()" title="Reset" class="flex h-8 w-8 items-center justify-center rounded text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                            <span class="material-symbols-outlined !text-sm">refresh</span>
                        </button>
                    </div>
                    <button type="button" onclick="closeCropper()" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Batal</button>
                    <button type="button" onclick="confirmCrop()" class="rounded-xl bg-primary px-5 py-2 text-sm font-bold text-white hover:bg-primary/90">Gunakan Gambar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    (function () {
        let _cropper = null;
        let _ctx    = null;

        window.openCropperForInput = function(inputId, aspectRatio, prevId, phId, lblId, ratioLabel) {
            const input = document.getElementById(inputId);
            if (!input) return;
            input.value = '';
            input.onchange = function () {
                if (!this.files || !this.files[0]) return;
                const reader = new FileReader();
                reader.onload = (e) => _showModal(e.target.result, aspectRatio, ratioLabel, inputId, prevId, phId, lblId);
                reader.readAsDataURL(this.files[0]);
            };
            input.click();
        };

        function _showModal(src, aspectRatio, ratioLabel, inputId, prevId, phId, lblId) {
            _ctx = { inputId, prevId, phId, lblId, aspectRatio };
            document.getElementById('cropperRatioLabel').textContent = ratioLabel;
            const img = document.getElementById('cropperImage');
            img.src = src;
            const modal = document.getElementById('cropperModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (_cropper) { _cropper.destroy(); _cropper = null; }
            setTimeout(() => {
                _cropper = new Cropper(img, {
                    aspectRatio: aspectRatio,
                    viewMode: 2,
                    dragMode: 'move',
                    guides: true,
                    center: true,
                    highlight: true,
                    background: true,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false,
                    autoCropArea: 0.9,
                });
            }, 120);
        }

        window.closeCropper = function() {
            document.getElementById('cropperModal').classList.add('hidden');
            document.getElementById('cropperModal').classList.remove('flex');
            if (_cropper) { _cropper.destroy(); _cropper = null; }
            _ctx = null;
        };

        window.cropperRotate  = (deg) => _cropper && _cropper.rotate(deg);
        window.cropperFlip    = (axis) => _cropper && (axis === 'x' ? _cropper.scaleX(-_cropper.getData().scaleX || -1) : _cropper.scaleY(-_cropper.getData().scaleY || -1));
        window.cropperReset   = () => _cropper && _cropper.reset();

        window.confirmCrop = function() {
            if (!_cropper || !_ctx) return;
            const canvas = _cropper.getCroppedCanvas({ maxWidth: 2400, maxHeight: 2400, fillColor: '#fff', imageSmoothingEnabled: true, imageSmoothingQuality: 'high' });
            canvas.toBlob((blob) => {
                const file = new File([blob], 'image.jpg', { type: 'image/jpeg' });
                const dt   = new DataTransfer();
                dt.items.add(file);
                const inputEl = document.getElementById(_ctx.inputId);
                if (inputEl) inputEl.files = dt.files;
                const prevEl = document.getElementById(_ctx.prevId);
                const phEl   = document.getElementById(_ctx.phId);
                const lblEl  = document.getElementById(_ctx.lblId);
                if (prevEl) { prevEl.src = canvas.toDataURL('image/jpeg', 0.93); prevEl.classList.remove('hidden'); }
                if (phEl)   phEl.classList.add('hidden');
                if (lblEl)  lblEl.textContent = 'Klik untuk mengganti';
                window.closeCropper();
            }, 'image/jpeg', 0.93);
        };

        // Close on backdrop click
        document.getElementById('cropperModal').addEventListener('click', function(e) {
            if (e.target === this) window.closeCropper();
        });
    })();
    </script>
</body>
</html>
