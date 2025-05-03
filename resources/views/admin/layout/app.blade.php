<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') - E-paie</title>


    {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">



    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="sb-nav-fixed">
    {{-- navbar --}}
    @include('admin.layout.inc.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            {{-- sidebar --}}
            @include('admin.layout.inc.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main class="my-4">
                <div class="container-fluid px-4">
                    @if (session()->has('message'))
                        <div id="disp-message" class="bg-success text-white p-4 m-5">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div id="disp-message" class="bg-warning text-white p-4 m-5">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    {{-- content --}}
                    @yield('content')
                </div>
            </main>
            @include('admin.layout.inc.footer')
        </div>
    </div>
    {{-- alert-msg --}}




    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/demo/chart-bar-demo.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script> --}}
    <script src="{{ asset('assets/admin/js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>

    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('assets/admin/js/summernote-fr-FR.js') }}"></script>


    <script src="{{ asset('OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>


    {{-- slect2 --}}
    <link rel="stylesheet" href="{{ asset('assets/select2/select2.min.css') }}">
    <script src="{{ asset('assets/select2/select2.min.js') }}"></script>

    <script>
        setTimeout(function() {
            $('#disp-message').fadeOut('slow');
        }, 4000)

        $(document).ready(function() {
            $('.basic-select').select2();
        });

        // 
        // heure minuite
        function getHoures(secondVal) {
            const houres = Math.floor(parseInt(secondVal) / 60);
            const minuite = parseInt(secondVal) % 60;
            let result = '';
            if (houres > 0) {
                result += `${houres}H`;
            }
            if (minuite > 0) {
                result += `${minuite}min`;

            }
            if (houres == 0 && minuite == 0) {
                result += "Non définie";
            }
            return result;
        }
    </script>


    @yield('script')
</body>

</html>
