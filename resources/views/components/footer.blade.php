<footer class="bg-slate-900 py-14 text-slate-300 dark:bg-background-dark sm:py-16">
    @php
        use App\Domain\Setting\Models\Setting;
        $footerLogo = Setting::getValue('logo_navbar');
        $companyName = Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding'));
        $companyEmail = Setting::getValue('company_email', config('bandungcoding.company.email', 'hello@bandungcoding.com'));
        $companyPhone = Setting::getValue('company_phone', config('bandungcoding.company.phone', '+62 (22) 1234-5678'));
        $companyAddress = Setting::getValue('company_address', config('bandungcoding.company.address', 'Jl. Gatot Subroto No. 123, Bandung, Jawa Barat'));
        $instagramUrl = Setting::getValue('instagram_url', config('bandungcoding.social.instagram', '#'));
        $linkedinUrl  = Setting::getValue('linkedin_url',  config('bandungcoding.social.linkedin', '#'));
        $facebookUrl  = Setting::getValue('facebook_url',  config('bandungcoding.social.facebook', '#'));
        $tiktokUrl    = Setting::getValue('tiktok_url',    config('bandungcoding.social.tiktok', '#'));
        $websiteUrl   = Setting::getValue('website_url',   config('bandungcoding.social.website', '#'));
    @endphp
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 xl:grid-cols-4">
            <div class="flex flex-col gap-5">
                <div class="flex items-center gap-2">
                    @if ($footerLogo)
                        <img src="{{ asset('storage/' . $footerLogo) }}" alt="{{ $companyName }}" class="h-10 w-auto object-contain" style="max-height:40px;width:auto;">
                    @else
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-white">
                            <span class="material-symbols-outlined">terminal</span>
                        </div>
                    @endif
                    <h2 class="text-xl font-bold tracking-tight text-white">{{ $companyName }}</h2>
                </div>
                <p class="max-w-xs text-sm leading-relaxed text-slate-400">
                    {{ __('messages.footer.tagline') }}
                </p>
                <div class="flex flex-wrap gap-2.5">
                    {{-- Instagram --}}
                    <a href="{{ $instagramUrl && $instagramUrl !== '#' ? $instagramUrl : '#' }}" @if($instagramUrl && $instagramUrl !== '#') target="_blank" rel="noopener noreferrer" @endif title="Instagram" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-white transition-colors hover:bg-primary">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    {{-- TikTok --}}
                    <a href="{{ $tiktokUrl && $tiktokUrl !== '#' ? $tiktokUrl : '#' }}" @if($tiktokUrl && $tiktokUrl !== '#') target="_blank" rel="noopener noreferrer" @endif title="TikTok" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-white transition-colors hover:bg-primary">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="{{ $facebookUrl && $facebookUrl !== '#' ? $facebookUrl : '#' }}" @if($facebookUrl && $facebookUrl !== '#') target="_blank" rel="noopener noreferrer" @endif title="Facebook" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-white transition-colors hover:bg-primary">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    {{-- LinkedIn --}}
                    <a href="{{ $linkedinUrl && $linkedinUrl !== '#' ? $linkedinUrl : '#' }}" @if($linkedinUrl && $linkedinUrl !== '#') target="_blank" rel="noopener noreferrer" @endif title="LinkedIn" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-white transition-colors hover:bg-primary">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    {{-- Website --}}
                    <a href="{{ $websiteUrl && $websiteUrl !== '#' ? $websiteUrl : '#' }}" @if($websiteUrl && $websiteUrl !== '#') target="_blank" rel="noopener noreferrer" @endif title="Website" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-800 text-white transition-colors hover:bg-primary">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="mb-5 text-base font-bold text-white sm:text-lg">{{ __('messages.footer.services') }}</h4>
                <ul class="flex flex-col gap-3 text-sm text-slate-400">
                    <li><a class="transition-colors hover:text-primary" href="{{ route('layanan.index') }}">{{ __('messages.footer.web_dev') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="{{ route('layanan.index') }}">{{ __('messages.footer.mobile_dev') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="{{ route('layanan.index') }}">{{ __('messages.footer.ui_ux') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="{{ route('layanan.index') }}">{{ __('messages.footer.digital_marketing') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="mb-5 text-base font-bold text-white sm:text-lg">{{ __('messages.footer.company') }}</h4>
                <ul class="flex flex-col gap-3 text-sm text-slate-400">
                    <li><a class="transition-colors hover:text-primary" href="{{ route('about') }}">{{ __('messages.footer.about') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="{{ route('portfolio.index') }}">{{ __('messages.footer.portfolio') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="#">{{ __('messages.footer.careers') }}</a></li>
                    <li><a class="transition-colors hover:text-primary" href="{{ route('contact') }}">{{ __('messages.footer.contact') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="mb-5 text-base font-bold text-white sm:text-lg">{{ __('messages.footer.contact_us') }}</h4>
                <ul class="flex flex-col gap-3 text-sm text-slate-400">
                    <li class="flex items-start gap-2.5">
                        <span class="material-symbols-outlined mt-0.5 text-sky-400">mail</span>
                        <span class="break-all">{{ $companyEmail }}</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="material-symbols-outlined mt-0.5 text-sky-400">phone</span>
                        <span>{{ $companyPhone }}</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="material-symbols-outlined mt-0.5 text-sky-400">location_on</span>
                        <span class="leading-relaxed" data-location="Bandung">{{ __('messages.footer.location') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-10 border-t border-slate-800 pt-6 text-center text-xs text-slate-500 sm:mt-12 sm:text-sm">
            <p>&copy; {{ date('Y') }} {{ $companyName }}. {{ __('messages.footer.rights') }}</p>
        </div>
    </div>
</footer>
