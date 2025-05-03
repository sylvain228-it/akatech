<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<style>
    .auth-bg {
        height: 100%;
        width: 100%;
        background-image: url('{{ asset('assets/invest.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>

<body class="auth-bg">

    @yield('content')
</body>

</html>
