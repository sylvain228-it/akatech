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

    <div class="sm:px-24 px-10 py-14 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-gris1 my-20 text-left">
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
    <div class="px-[20px] md:px-[50px] grid grid-cols-1 lg:grid-cols-3 gap-7">
        <div class="lg:col-span-1">
            <div class="flex gap-2 items-center mb-5">
                <div class="w-25 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%"></div>
                <h3 class="text-xl text-primaryB font-bold">Qui sommes nous ?</h3>
            </div>
            <h3 class="text-3xl capitalize font-bold my-5">Déjà plus de 4 ans à vos côtés pour vous fournir des <span
                    class=" text-primaryB">solutions informatiques fiables</span>.</h3>
            <p class="my-5">Concentrez-vous sur ce que vous faites de mieux, on prend en charge toute votre informatique.
            </p>
            <a href="{{ route('about') }}" class="text-[16px] font-medium hover:text-primaryB">En savoir plus</a>
        </div>
        <div class="flex flex-col md:flex-row gap-7 w-full lg:col-span-2">
            <img src="{{ asset('default/dev_1.jpg') }}"
                class="rounded-2xl border-t-10 border-l-10 border-primaryB w-full max-h-[450px] object-cover shadow-md"
                alt="">
            <div>
                <p>Chez IpsecSecureNET, pas de solutions toutes faites, ni de réponses préconçues ou de forfaits figés.

                    Il y a d’abord vous : votre activité, votre environnement informatique, et surtout vos ambitions.

                    C’est pourquoi, avant toute proposition, nous prenons le temps de vous écouter. Comprendre vos besoins,
                    vos
                    attentes et les spécificités de votre marché, c’est ce qui nous permet de construire une solution
                    vraiment
                    sur mesure.</p>
            </div>
        </div>
    </div>

    <div class="sm:px-24 px-10 py-14 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-gray-200 my-20 text-left">
        <img data-aos="zoom-in" src="{{ asset('default/web_4.jpg') }}"
            class="w-full rounded-2xl border-t-10 border-l-10 border-gris1" alt="">
        <div>
            <h3 class="text-2xl font-bold capitalize text-gris2 mb-5 leading-[38px]">On conçoit votre site web en tenant
                compte de ce qui compte vraiment pour votre entreprise.</h3>
            <div class="flex gap-3 items-start">
                <div class="w-3 h-20 bg-primaryYe"></div>
                <div>
                    <p class="text-gray-700 leading-[28px] m-0">De notre première conversation à la maintenance continue de
                        votre site, nous nous engageons à vous offrir un service attentif et de qualité. Notre priorité :
                        construire une relation de confiance, transparente et durable, où la communication reste toujours
                        ouverte.
                    </p>
                    <p class="text-gray-700 leading-[28px] mt-1">En comprenant précisément vos besoins et vos attentes,
                        notre
                        équipe saura vous guider vers le CMS ou la solution sur mesure la plus en phase avec vos objectifs.
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection
