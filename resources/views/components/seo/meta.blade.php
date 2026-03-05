{{-- Komponen SEO Meta Tags --}}
{{-- Digunakan di layout utama untuk set meta tags per halaman --}}
@php
    use App\Domain\Setting\Models\Setting;
    $defaultTitle = Setting::getValue('seo_meta_title', config('bandungcoding.seo.title'));
    $defaultDescription = Setting::getValue('seo_meta_description', config('bandungcoding.seo.description'));
@endphp
@props([
    'title' => $defaultTitle,
    'description' => $defaultDescription,
])

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ config('bandungcoding.seo.keywords') }}">

{{-- Open Graph --}}
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ asset(config('bandungcoding.seo.og_image')) }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="id_ID">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ url()->current() }}">
