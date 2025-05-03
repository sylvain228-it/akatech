@auth
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/3.0.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @include('frontend.layout.navbar')

        <main>
            @php
                $title = 'Tableau de bord';
            @endphp
            @include('frontend.layout.inc.banner')
            <div class="grid gap-10 grid-cols-1 lg:grid-cols-11 container mx-auto my-12 px-8">
                <div class="hidden lg:block lg:col-span-3">
                    @include('frontend.profile.inc.nav-item')
                </div>
                <div class="lg:col-span-8">
                    @if (session('error'))
                        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded" id="error-msg">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded" id="success-msg">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        @include('frontend.inc.footer')
        <script src="{{ asset('assets/js/xlsx.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/jspdf.umd.min.js') }}"></script>
        <script src="{{ asset('assets/js/autotable.min.js') }}"></script>
        @yield('script')
    </body>

    </html>

@endauth
