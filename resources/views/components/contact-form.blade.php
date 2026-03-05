{{-- Komponen Contact Form --}}
{{-- Form kontak dengan validasi dan feedback --}}

<form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
    @csrf

    {{-- Success Message --}}
    @if (session('success'))
        <div class="p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Name & Email --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="Masukkan nama Anda">
            @error('name')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="email@contoh.com">
            @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Phone & Subject --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Telepon</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="+62 812-xxxx-xxxx">
            @error('phone')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subjek *</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="Tentang apa pesan Anda?">
            @error('subject')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Message --}}
    <div>
        <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Pesan *</label>
        <textarea id="message" name="message" rows="5" required
                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all resize-none"
                  placeholder="Tuliskan pesan Anda...">{{ old('message') }}</textarea>
        @error('message')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit --}}
    <button type="submit"
            class="w-full md:w-auto px-8 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-md shadow-blue-500/25 hover:shadow-lg hover:shadow-blue-500/40 transform hover:-translate-y-0.5 transition-all duration-200">
        Kirim Pesan
    </button>
</form>
