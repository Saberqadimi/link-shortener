<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="shorten-url" content="{{ route('link.store') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://cdn6.aptoide.com/imgs/4/8/2/4827f804e2e87268a9ff7056541db259_icon.png">

    <title>@yield('title')</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/link-shortener/css/link-shortener.css') }}">
    
    @yield('extra-css')
</head>

<body>
    <div class="gradient-background">
        <div class="gradient-sphere sphere-1"></div>
        <div class="gradient-sphere sphere-2"></div>
        <div class="gradient-sphere sphere-3"></div>
        <div class="glow"></div>
        <div class="grid-overlay"></div>
        <div class="noise-overlay"></div>
        <div class="particles-container" id="particles-container"></div>
    </div>
    <div class="shadow-effect"></div>
    <div class="header">
        <div class="logo">laravel/link-shortener</div>
        <div class="toggleMenu"></div>
    </div>
    
    @yield('content')
    <script src="{{ asset('vendor/link-shortener/js/link-shortener-analysis.js') }}"></script>
    <script src="{{ asset('vendor/link-shortener/js/link-shortener.js') }}"></script>
</body>

</html>
