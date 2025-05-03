<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen flex flex-col">
    @include('frontend.layout.inc.top-bar')
    @include('frontend.layout.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>
    @include('frontend.layout.inc.footer')

    <script src="{{ asset('OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
    @yield('script')
</body>

</html>
