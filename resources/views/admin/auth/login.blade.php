<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — {{ config('bandungcoding.company.name', 'BandungCoding') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    @php $faviconPath = \App\Domain\Setting\Models\Setting::getValue('logo_favicon'); @endphp
    @if($faviconPath)
        <link rel="icon" href="{{ asset('storage/' . $faviconPath) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 font-sans antialiased flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        {{-- Logo / Brand --}}
        <div class="mb-8 text-center">
            @php $logoPath = \App\Domain\Setting\Models\Setting::getValue('logo_navbar'); @endphp
            @if($logoPath)
                <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" class="mx-auto mb-3 object-contain" style="height:80px;max-width:200px;width:auto;">
            @else
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3"/>
                    </svg>
                </div>
            @endif
            <h1 class="text-2xl font-extrabold tracking-tight text-white">Admin Panel</h1>
            <p class="mt-1 text-sm text-slate-400">{{ config('bandungcoding.company.name', 'BandungCoding') }}</p>
        </div>

        {{-- Card --}}
        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-8 shadow-2xl">

            {{-- Success message (setelah logout) --}}
            @if(session('success'))
                <div class="mb-5 rounded-xl border border-emerald-700/40 bg-emerald-900/30 px-4 py-3 text-sm font-medium text-emerald-400">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error --}}
            @if($errors->any())
                <div class="mb-5 rounded-xl border border-rose-700/40 bg-rose-900/30 px-4 py-3 text-sm text-rose-400">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Username --}}
                <div>
                    <label for="username" class="mb-1.5 block text-sm font-semibold text-slate-300">Username</label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        autofocus
                        placeholder="Masukkan username"
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-sm text-white placeholder-slate-500 transition-colors focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30 @error('username') border-rose-500 @enderror"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="mb-1.5 block text-sm font-semibold text-slate-300">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-sm text-white placeholder-slate-500 transition-colors focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30"
                    >
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white transition-opacity hover:opacity-90 active:scale-[0.98]"
                >
                    Masuk ke Admin Panel
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-slate-600">
            &copy; {{ date('Y') }} {{ config('bandungcoding.company.name', 'BandungCoding') }}
        </p>
    </div>

</body>
</html>
