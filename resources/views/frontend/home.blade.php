@extends('frontend.layout.app')
@section('title')
    Accueil
@endsection
@section('content')

    @if ($imagesCarousel->count() > 0)
        <div class="owl-carousel owl-theme">
            @foreach ($imagesCarousel as $carousel)
                @include('frontend.layout.home-banner')
            @endforeach
        </div>
    @endif

    <div class="sm:px-24 px-5 py-14 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-gris1 my-20 text-left">
        <div>
            <div class="mb-5 flex gap-2 items-center">
                <div class="h-5 w-5 bg-primaryYe rounded-[100%]"></div>
                <h3 class="text-gray-600 text-xl font-bold uppercase ">Solutions de
                    développement
                    Web</h3>
            </div>
            <h3 class="text-2xl font-bold capitalize text-white mb-5 leading-[38px]">Créez votre espace digital sur mesure,
                pensé
                pour
                attirer
                vos visiteurs
                et les engager durablement.</h3>
            <div class="flex gap-3 items-start">
                <div class="w-3 h-20 bg-primaryYe"></div>
                <p class="text-gray-200 leading-[28px] m-0">On sera à vos côtés à chaque étape pour créer un site web qui
                    vous
                    ressemble vraiment —
                    un site qui raconte
                    votre histoire, met en valeur ce qui vous rend unique, et qui marque les esprits dès la première visite.
                </p>
            </div>
        </div>
        <img data-aos="zoom-in" src="{{ asset('default/akatech_img.jpg') }}"
            class="w-full rounded-2xl border-b-10 border-r-10 border-white" alt="">
    </div>

    {{-- qui sommes-nous --}}
    <section class="my-32">
        <div class="px-5 md:px-[50px] grid grid-cols-1 lg:grid-cols-3 gap-7">
            <div data-aos="fade-right" class="lg:col-span-1">
                <div class="flex gap-2 items-center mb-5">
                    <div
                        class="w-16 sm:w-20 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                    <h3 class="text-xl text-primaryB font-bold">Qui sommes nous ?</h3>
                </div>
                <h3 class="text-3xl capitalize font-bold my-5 leading-[40px]">Déjà plus de 4 ans à vos côtés pour vous
                    fournir
                    des <span class=" text-primaryB">solutions informatiques fiables</span>.</h3>
                <p class="my-5">Concentrez-vous sur ce que vous faites de mieux, on prend en charge toute votre
                    informatique.
                </p>
                <a href="{{ route('about') }}" class="text-[16px] font-medium hover:text-primaryB text-gray-500">En savoir
                    plus</a>
            </div>
            <div class="flex flex-col md:flex-row gap-7 w-full lg:col-span-2">
                <img data-aos="zoom-out" src="{{ asset('default/dev_1.jpg') }}"
                    class="rounded-2xl border-t-10 border-l-10 border-primaryB w-full max-h-[400px] object-cover shadow-md"
                    alt="">
                <div data-aos="fade-right" class="leading-[30px]">
                    <p class="tracking-wider mb-4">Chez <span
                            class="text-[20px] font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryYe to-primaryB">AKATE</span>,
                        pas de solutions toutes faites, ni de réponses préconçues ou de forfaits figés.</p>
                    <p class="mb-4 tracking-wider">Il y a d’abord vous : votre activité, votre environnement informatique,
                        et
                        surtout
                        vos
                        ambitions.</p>
                    <p class="mb-4 tracking-wider">C’est pourquoi, avant toute proposition, nous prenons le temps de vous
                        écouter.
                        Comprendre vos besoins,
                        vos
                        attentes et les spécificités de votre marché, c’est ce qui nous permet de construire une solution
                        vraiment
                        sur mesure.</p>
                    <div class="w-full h-2 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- nos services --}}
    <section class="my-32">
        <div class="flex gap-1 items-center justify-center mb-3">
            <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
            </div>
            <h5 class="text-[15px] text-primaryB uppercase font-medium">Nos offres de services.
            </h5>
            <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
            </div>
        </div>
        <p class="text-center capitalize font-medium text-[28px]">Des prestations personnalisées <br> pour répondre aux
            besoins
            de
            votre entreprise</p>
        <style>
            .sev1 {
                background: url("{{ asset('default/banner.webp') }}") no-repeat center/cover;
                border-radius: 16px;
            }

            .sev2 {
                background: url("{{ asset('default/web_3.jpg') }}") no-repeat center/cover;
                border-radius: 16px;
            }

            .sev3 {
                background: url("{{ asset('default/web_1.jpg') }}") no-repeat center/cover;
                border-radius: 16px;
            }

            .ser-overlay {
                background-color: rgba(0, 0, 0, 0.6);
                height: 500px;
                padding: 30px;
                transition-duration: 2s;
            }

            .ser-overlay:hover {
                background-color: #0058a8CD;
            }

            .sevss:hover .ser-overlay .caption {
                margin-top: inherit;
            }

            .sevss .hidden-cap {
                display: none;
            }

            .sevss:hover .ser-overlay .hidden-cap {
                display: inherit;
            }
        </style>
        <div class="mt-10 px-5 md:px-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 justify-center items-start">
            <div class="sev1 sevss shadow-md rounded-[16px] cursor-pointer transition duration-300 transform">
                <div class="ser-overlay flex flex-col">
                    <div class="caption mt-auto text-white transition-all duration-300">
                        <h3 class="uppercase text-[16px] text-white mb-4">Aka Technologies</h3>
                        <h2 class=" capitalize text-2xl font-bold">{{ substr('Création de site web et mobile', 0, 40) }}...
                        </h2>
                        <div class="my-3 hidden-cap">
                            <p class="font-medium leading-[26px] mb-5">Nous réalisons des sites internet modernes, clairs et
                                adaptés à tous les
                                écrans. Que vous
                                ayez
                                besoin d’un site vitrine, d’une boutique en ligne ou d’un espace personnalisé, on s’occupe
                                de
                                tout – du design à la mise en ligne.</p>
                            <div
                                class="px-5 py-2 mt-8 font-medium flex flex-col items-center hover:scale-90 text-[20px] hover:bg-primaryYe hover:text-primaryB transition duration-300 bg-white text-black">
                                <a href="#" class="">Détails
                                    <i class="bi bi-arrow-right-short text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sev2 sevss shadow-md rounded-[16px] cursor-pointer">
                <div class="ser-overlay flex flex-col">
                    <div class="caption mt-auto text-white">
                        <h3 class="uppercase text-[16px] text-white mb-4">Aka Technologies</h3>
                        <h2 class=" capitalize text-2xl font-bold">
                            {{ substr("Sécurité des systémes d'informations", 0, 40) }}...</h2>

                        <div class="my-3 hidden-cap">
                            <p class="font-medium leading-[26px] mb-5">Vos données sont précieuses. On vous aide à les
                                protéger avec des solutions adaptées : sauvegardes, antivirus, pare-feu, audits de sécurité…
                                Vous travaillez l’esprit tranquille, on veille au reste.</p>
                            <div
                                class="px-5 py-2 mt-8 font-medium flex flex-col items-center hover:scale-90 text-[20px] hover:bg-primaryYe hover:text-primaryB transition duration-300 bg-white text-black">
                                <a href="#" class="">Détails
                                    <i class="bi bi-arrow-right-short text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sev3 sevss shadow-md rounded-[16px] cursor-pointer">
                <div class="ser-overlay flex flex-col">
                    <div class="caption mt-auto text-white">
                        <h3 class="uppercase text-[16px] mb-4">Aka Technologies</h3>
                        <h2 class=" capitalize text-2xl font-bold">{{ substr('Conseption de graphique', 0, 40) }}...</h2>
                        <div class="my-3 hidden-cap">
                            <p class="font-medium leading-[26px] mb-5">Vous avez besoin de flyers, affiches, bannières ou
                                contenus visuels pour vos réseaux ? On vous propose des créations originales et percutantes,
                                prêtes à capter l’attention.</p>
                            <div
                                class="px-5 py-2 mt-8 font-medium flex flex-col items-center hover:scale-90 text-[20px] hover:bg-primaryYe hover:text-primaryB transition duration-300 bg-white text-black">
                                <a href="#" class="">Détails
                                    <i class="bi bi-arrow-right-short text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-32">
        <div class="sm:px-24 px-5 py-14  grid grid-cols-1 lg:grid-cols-2 gap-10 bg-gray-200 my-20 text-left">
            <img data-aos="zoom-in" src="{{ asset('default/web_4.jpg') }}"
                class="w-full rounded-2xl border-t-10 border-l-10 border-gris1" alt="">
            <div>
                <h3 class="text-2xl font-bold capitalize text-gris2 mb-5 leading-[38px]">On conçoit votre site web en tenant
                    compte de ce qui compte vraiment pour votre entreprise.</h3>
                <div class="flex gap-3 items-start">
                    <div class="w-3 h-20 bg-primaryYe"></div>
                    <div>
                        <p class="text-gray-700 leading-[28px] m-0">De notre première conversation à la maintenance continue
                            de
                            votre site, nous nous engageons à vous offrir un service attentif et de qualité. Notre priorité
                            :
                            construire une relation de confiance, transparente et durable, où la communication reste
                            toujours
                            ouverte.
                        </p>
                        <p class="text-gray-700 leading-[28px] mt-1">En comprenant précisément vos besoins et vos attentes,
                            notre
                            équipe saura vous guider vers le CMS ou la solution sur mesure la plus en phase avec vos
                            objectifs.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <script>
        // owl-carousel
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            pagination: false,
            nav: false,
            dots: false,
            singleItem: true,
            responsive: {
                0: {
                    items: 1,
                },
            },
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            checkVisibility: false,
        });
    </script>
@endsection
