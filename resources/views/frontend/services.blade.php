@extends('frontend.layout.app')
@section('title')
    A propos
@endsection
@section('content')
    @php
        $title = 'Nos services';
    @endphp
    @include('frontend.layout.inc.banner')
    <section class="my-32">
        <div class="sm:px-24 px-5  grid grid-cols-1 lg:grid-cols-2 gap-10 text-left">
            <div class="relative grid grid-cols-3 min-h-[350px] mb-20">
                <img data-aos="zoom-in" src="{{ asset('default/afro_chef.jpg') }}"
                    class="w-[45%] absolute top-0 left-[7%] md:left-[10%] z-40 h-full object-cover" alt="">
                <img data-aos="zoom-in" src="{{ asset('default/dev_1.jpg') }}"
                    class="w-[45%] absolute top-[10%] right-[7%] md:right-[10%] z-30 h-full object-cover" alt="">
                <img data-aos="zoom-in" src="{{ asset('default/akatech_img.jpg') }}"
                    class="w-[45%] absolute top-[55%] left-[20%] z-50 h-[75%] object-cover" alt="">
            </div>
            <div>
                <div class="flex gap-1 items-center justify-center mb-3">
                    <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                    <h5 class="text-[15px] text-primaryB uppercase font-medium">Avec nous,
                        vos projets prennent la voie de l’excellence.
                    </h5>
                    <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                </div>
                <h1 class="text-4xl font-bold mb-4 text-center leading-12">Pourquoi <span
                        class=" text-primaryB font-bold">nos
                        solutions séduisent-elles</span> autant d’entreprises
                    ?</h1>
                <div class="flex gap-3 items-start mb-3">
                    <div class="w-3 h-20 bg-primaryYe"></div>
                    <div>
                        <p class="text-gray-700 leading-8">Nous proposons un éventail complet de services, allant
                            de l’intégration de systèmes à la conception et au développement de sites web, en passant par le
                            community management et la création de supports de communication.
                        </p>
                        <p class="text-gray-700 leading-8 mt-2">Notre équipe pluridisciplinaire, composée de
                            collaborateurs permanents et de consultants experts dans différents domaines de l’informatique,
                            est mobilisée pour répondre avec précision à vos besoins spécifiques.
                        </p>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#services" class="btn">Découvrez nos services <i class="bi bi-caret-down"></i></a>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-gray-100 min-h-screen py-12 px-5 md:px-20" id="services">
        {{-- nos service --}}
        <div class="flex gap-1 items-center justify-center mb-3">
            <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
            </div>
            <h5 class="text-[15px] text-primaryB uppercase font-medium">Nos services.
            </h5>
            <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
            </div>
        </div>
        <div class="md:max-w-[500px] mx-auto leading-20 tracking-wider">
            <p class="text-center capitalize font-medium text-3xl">Des <span class="text-primaryB font-bold">solutions
                    exclusives</span> conçues spécialement pour votre
                <span class="text-primaryB font-bold">entreprise</span> .
        </div>
        </p>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 justify-center items-start">
            @foreach ($services as $item)
                <div data-aos="zoom-in"
                    style="background-image: url(<?= asset('storage/' . $item->cover) ?>); background-repeat: no-repeat; background-position: center; background-size: cover;"
                    class="sevss shadow-md rounded-[16px] cursor-pointer transition duration-300 transform">
                    <div class="ser-overlay flex flex-col">
                        <div class="caption mt-auto text-white transition-all duration-300">
                            <h3 class="uppercase text-[16px] text-white mb-4">Aka Technologies</h3>
                            <h2 class=" capitalize text-2xl font-bold">
                                {{ substr($item->title, 0, 40) }}{{ strlen($item->title) > 40 ? '...' : '' }}
                            </h2>
                            <div class="my-3 hidden-cap">
                                <p class="font-medium leading-[26px] mb-5">
                                    {{ substr($item->description, 0, 150) }}{{ strlen($item->description) > 150 ? '...' : '' }}
                                </p>
                                <div
                                    class="px-5 py-2 mt-8 font-medium flex flex-col items-center hover:scale-90 text-[20px] hover:bg-primaryYe hover:text-primaryB transition duration-300 bg-white text-black">
                                    <a href="#" class="">Détails
                                        <i class="bi bi-arrow-right-short text-2xl"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    @include('frontend.layout.inc.call-to-action')


    <section class="my-20">
        <div class="flex flex-col justify-center mb-10 ">
            <h4 class="text-3xl text-primaryB font-bold uppercase text-center">Nos technologies</h4>
            <div
                class="mx-auto w-[20%] mt-3 h-2 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
            </div>
        </div>
        @include('frontend.layout.inc.tech-icons')
    </section>
@endsection


@section('script')
    <script>
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            items: 6,
            pagination: false,
            nav: false,
            dots: false,
            singleItem: true,
            responsive: {
                0: {
                    items: 3,
                },
                600: {
                    items: 4,
                },
                1024: {
                    items: 6,
                }

            },
            autoplay: true,
            autoplayTimeout: 2500,
            checkVisibility: false,
        });
    </script>
@endsection
