@extends('frontend.layout.app')
@section('title')
    A propos
@endsection
@section('content')
    @php
        $title = 'A propos de nous';
    @endphp
    @include('frontend.layout.inc.banner')
    <section class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="order-last md:order-first">
                <h1 class="text-4xl font-bold text-primaryB mb-6">Qui sommes-nous ?</h1>
                <p class="text-gray-700 text-lg mb-4 leading-[30px]">
                    Chez <span
                        class="text-[20px] font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryYe to-primaryB">AKATE</span>,
                    nous croyons que le numérique doit être simple, efficace et au service
                    de vos idées. C’est pourquoi nous avons créé une structure dédiée à vous accompagner dans tous vos
                    projets digitaux, que vous soyez une entreprise, une association ou un indépendant.
                </p>

            </div>

            <div class="text-center">
                <img src="{{ asset('default/web_3.jpg') }}" alt="À propos" class="rounded-xl shadow-md mx-auto">
            </div>
        </div>

        <div class="mx-auto px-20 my-10">
            <h3 class="text-2xl font-bold mt-4 mb-5 text-gris1 ">Ce que nous faisons :</h3>
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
                <div
                    class="mb-4 hover:border-3 hover:cursor-default hover:border-primaryB transition-all duration-300 hover:p-3 hover:rounded-2xl">
                    <h5 class="text-xl font-bold mb-2 text-primaryB"><i
                            class="bi bi-arrow-right-circle text-primaryYe font-bold me-2"></i>Création
                        de
                        sites web
                    </h5>
                    <p>Nous réalisons des sites internet modernes, clairs et adaptés à tous les écrans. Que vous ayez besoin
                        d’un site vitrine, d’une boutique en ligne ou d’un espace personnalisé, on s’occupe de tout – du
                        design
                        à la mise en ligne.</p>
                </div>
                <div
                    class="mb-4 hover:border-3 hover:cursor-default hover:border-primaryB transition-all duration-300 hover:p-3 hover:rounded-2xl">
                    <h5 class="text-xl font-bold mb-2 text-primaryB"><i
                            class="bi bi-arrow-right-circle text-primaryYe font-bold me-2"></i>Création
                        de
                        sites web
                    </h5>
                    <p>Nous réalisons des sites internet modernes, clairs et adaptés à tous les écrans. Que vous ayez besoin
                        d’un site vitrine, d’une boutique en ligne ou d’un espace personnalisé, on s’occupe de tout – du
                        design
                        à la mise en ligne.</p>
                </div>
                <div
                    class="mb-4 hover:border-3 hover:cursor-default hover:border-primaryB transition-all duration-300 hover:p-3 hover:rounded-2xl">
                    <h5 class="text-xl font-bold mb-2 text-primaryB"><i
                            class="bi bi-arrow-right-circle text-primaryYe font-bold me-2"></i>Développement d’applications
                        web et mobiles
                    </h5>
                    <p>Vous avez une idée d’application ou vous voulez digitaliser un service ? Nous développons des applis
                        pratiques, rapides et faciles à utiliser, pour le web, Android ou iOS.</p>
                </div>
                <div
                    class="mb-4 hover:border-3 hover:cursor-default hover:border-primaryB transition-all duration-300 hover:p-3 hover:rounded-2xl">
                    <h5 class="text-xl font-bold mb-2 text-primaryB"><i
                            class="bi bi-arrow-right-circle text-primaryYe font-bold me-2"></i>Sécurité informatique &
                        protection des données
                    </h5>
                    <p>Vos données sont précieuses. On vous aide à les protéger avec des solutions adaptées : sauvegardes,
                        antivirus, pare-feu, audits de sécurité… Vous travaillez l’esprit tranquille, on veille au reste.
                    </p>
                </div>
                <div
                    class="mb-4 hover:border-3 hover:cursor-default hover:border-primaryB transition-all duration-300 hover:p-3 hover:rounded-2xl">
                    <h5 class="text-xl font-bold mb-2 text-primaryB"><i
                            class="bi bi-arrow-right-circle text-primaryYe font-bold me-2"></i>Création d’affiches
                        publicitaires & visuels
                    </h5>
                    <p>Vous avez besoin de flyers, affiches, bannières ou contenus visuels pour vos réseaux ? On vous
                        propose des créations originales et percutantes, prêtes à capter l’attention.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 my-20 gap-10 lg:grid-cols-2 px-3 sm:px-20">
            <div>
                <h3 class="text-2xl font-bold mb-2 text-primaryB">Pourquoi nous choisir ?</h3>
                <div class="flex gap-2 items-start">
                    <i class="bi bi-check-circle text-primaryYe font-bold text-xl"></i>
                    <p class=" leading-[28px] mb-2">Parce qu’on aime ce qu’on fait, et qu’on le fait bien. On vous écoute,
                        on
                        vous
                        conseille, et surtout, on
                        vous livre des résultats concrets.
                        Votre projet mérite d’être bien fait, et c’est exactement ce qu’on vous propose.
                    </p>
                </div>
                <div class="flex gap-2 items-start">
                    <i class="bi bi-check-circle text-primaryYe font-bold text-xl"></i>
                    <p class="leading-[28px] mb-2">Un site Web à votre image : on crée pour vous un site qui reflète
                        vraiment votre marque et parle directement à votre public.</p>
                </div>
                <div class="flex gap-2 items-start">
                    <i class="bi bi-check-circle text-primaryYe font-bold text-xl"></i>
                    <p class="leading-[28px] mb-2">Intuitif et simple à gérer : nous concevrons un site Web facile à
                        utiliser et à administrer, vous offrant la possibilité de le mettre à jour facilement et de
                        maîtriser votre présence en ligne.</p>
                </div>
                <div class="flex gap-2 items-start">
                    <i class="bi bi-check-circle text-primaryYe font-bold text-xl"></i>
                    <p class="leading-[28px] mb-2">Un accompagnement sur mesure : notre équipe est là pour vous former et
                        vous soutenir, afin que vous puissiez tirer le meilleur parti de votre site Web, en toute autonomie.
                    </p>
                </div>
            </div>
            <img src="{{ asset('default/html-system-website-concept.jpg') }}"
                class="rounded-2xl border-t-10 border-l-10 border-primaryYe w-full" alt="">
        </div>
    </section>
@endsection
