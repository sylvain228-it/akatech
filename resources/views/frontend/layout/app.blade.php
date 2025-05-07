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
    <link rel="stylesheet" href="{{ asset('assets/css/aos2.3.4.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen flex flex-col">
    @include('frontend.layout.inc.top-bar')
    @include('frontend.layout.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>
    {{-- scrollTopBtn --}}
    <i class="fixed right-10 bottom-10 cursor-pointer px-2 py-1 bi bi-arrow-up-circle-fill text-2xl font-bold rounded-[5px] z-50 bg-primaryB text-white hidden"
        id="scrollTopBtn"></i>
    @include('frontend.layout.inc.newsletter')
    @include('frontend.layout.inc.footer')

    <script src="{{ asset('assets/js/aos2.3.4.js') }}"></script>
    <script src="{{ asset('OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>

    <script>
        AOS.init();
    </script>

    <script>
        document.getElementById("newsletterForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const form = e.target;
            const data = {
                email: form.email.value.trim(),
            };
            const errorMsg = document.getElementById("error-msg");
            const successMsg = document.getElementById("success-msg");


            if (!data.email) {
                errorMsg.classList.remove("hidden");
                errorMsg.innerText = "Ce champs est requis.";
                return;
            }

            fetch("/newsletter", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(data),
                }, )
                .then((response) => response.json())
                .then((result) => {
                    errorMsg.classList.add("hidden");
                    successMsg.classList.remove("hidden");
                    successMsg.innerText = result.message;
                    form.reset();
                }, )
                .catch((error) => {
                    errorMsg.classList.remove("hidden");
                    successMsg.classList.add("hidden");
                    errorMsg.innerText = "Une erreur est survenue.";
                    console.error(error);
                }, );
        }, );

        // fin
    </script>
    @yield('script')
</body>

</html>
