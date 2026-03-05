@php
    use App\Domain\Setting\Models\Setting;
    
    // Ambil nomor WhatsApp dari settings
    $whatsappNumber = Setting::getValue('whatsapp_number', '');
    
    // Ambil custom WhatsApp link (jika ada) atau generate dari nomor
    $whatsappLink = Setting::getValue('whatsapp_link', '');
    
    // Jika tidak ada custom link, generate dari nomor
    if (empty($whatsappLink) && !empty($whatsappNumber)) {
        // Bersihkan nomor dari karakter non-digit
        $cleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
        // Format link WhatsApp
        $whatsappLink = "https://wa.me/{$cleanNumber}";
    }
@endphp

@if($whatsappLink)
<!-- Floating WhatsApp Button -->
<div class="fixed bottom-6 right-6 z-50 group">
    <a href="{{ $whatsappLink }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] shadow-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-[#25D366]/50"
       aria-label="{{ __('messages.whatsapp.aria_label') }}">
        <!-- WhatsApp Icon -->
        <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    
    <!-- Auto-popup bubble -->
    <div id="wa-bubble" class="wa-bubble pointer-events-none absolute bottom-16 right-0 mb-2 w-52 rounded-xl bg-white px-4 py-3 shadow-xl">
        <p class="text-sm leading-snug text-slate-700">
            {{ __('messages.whatsapp.bubble_text') }} <span class="font-bold text-slate-900">{{ __('messages.whatsapp.bubble_cta') }}</span>
        </p>
        <!-- Arrow -->
        <div class="absolute -bottom-2 right-5 h-4 w-4 rotate-45 bg-white shadow-[2px_2px_4px_rgba(0,0,0,0.08)]"></div>
    </div>
</div>

<style>
    /* Pulse shadow on WA button */
    @keyframes wa-pulse {
        0%, 100% { box-shadow: 0 10px 30px rgba(37,211,102,0.4); }
        50%       { box-shadow: 0 10px 45px rgba(37,211,102,0.65); }
    }
    .group > a {
        animation: wa-pulse 2s ease-in-out infinite;
    }

    /* Auto show/hide bubble: visible 3.5s, hidden 5s, cycle = 8.5s */
    @keyframes wa-bubble-cycle {
        0%      { opacity: 0; transform: translateY(6px) scale(0.95); }
        6%      { opacity: 1; transform: translateY(0)   scale(1);    }
        41%     { opacity: 1; transform: translateY(0)   scale(1);    }
        53%     { opacity: 0; transform: translateY(6px) scale(0.95); }
        100%    { opacity: 0; transform: translateY(6px) scale(0.95); }
    }
    .wa-bubble {
        opacity: 0;
        transform-origin: bottom right;
        animation: wa-bubble-cycle 8.5s ease-in-out infinite;
    }

    /* Mobile */
    @media (max-width: 640px) {
        .fixed.bottom-6.right-6 { bottom:1.25rem; right:1.25rem; }
        .group > a { height:3.5rem; width:3.5rem; }
        .group > a svg { height:1.75rem; width:1.75rem; }
        .wa-bubble { width:10.5rem; }
    }
</style>
@endif
