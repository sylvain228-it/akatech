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

    <section class="bg-gray-100 py-12" id="sectionPlants">
        <div class="max-w-7xl mx-auto px-4 text-center">

            <section
                class="bg-yellow-50 py-10 px-6 md:px-20 my-5 flex flex-col md:flex-row items-center justify-between rounded-xl shadow-lg mt-10">
                <!-- Texte -->
                <div class="mb-6 md:mb-0 max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                        Payez facilement avec TMoney !
                    </h2>
                    <p class="text-gray-700 text-lg">
                        Profitez d’un paiement rapide, sécurisé et sans tracas grâce à notre intégration TMoney. Accessible
                        à tout moment, où que vous soyez.
                    </p>
                </div>

                <div class="flex-shrink-0">
                    <img src="{{ asset('default/banner.webp') }}" alt="Logo TMoney" class="w-52 md:w-72 object-cover h-auto">
                </div>
            </section>

            <section class="my-10 bg-white shadow p-10">
                <div class="grid my-10 gap-7 grid-cols-1 md:grid-cols-2 items-center">
                    <i class="bi bi-shield-check text-9xl text-primary"></i>
                    <div>
                        <h3 class="text-2xl font-bold">Sécurité</h3>
                        <p class="text-left mt-2">Tous vos paiements sont 100% sécurisés. Vos informations sont protégées et
                            traitées en toute
                            confidentialité via des canaux fiables comme TMoney et Flooz.</p>
                    </div>
                </div>
            </section>


            <section class="my-10">
                <h3 class="text-2xl font-bold text-gray-800">Comment ça marche ?</h3>
                <p class="mt-2">Notre plateforme de paiement local vous permet de régler facilement vos investissements
                    selon votre
                    classe (Silver, Gold, Premium) via TMoney ou Flooz, tout en assurant sécurité, transparence et
                    fiabilité. Gagnez du temps, évitez les fraudes, et contribuez sereinement à la croissance de votre
                    groupe.</p>

                <div class="grid my-10 gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-[8px] shadow p-3">
                        <i class="bi bi-person-check-fill text-7xl text-blue-600"></i>
                        <h3 class="text-2xl my-3 font-bold">Créer un Compte</h3>
                        <p class="mt-2">Remplissez en quelques minutes le formulaire d'inscription. Vous recevrez
                            immédiatement un email de confirmation contenant le lien
                            pour acceder à votre interface tableau de bord.</p>
                    </div>
                    <div class="rounded-[8px] shadow p-3">
                        <i class="bi bi-bookmarks text-7xl text-green-600"></i>
                        <h3 class="text-2xl my-3 font-bold">Sélectionner un plan</h3>
                        <p class="mt-2">
                            Une fois accéder à votre interface tableau de bord, clicker sur l'élément du menu <b>Plant
                                d'investisment</b> et ensuite sélectionner un plant.
                        </p>
                    </div>
                    <div class="rounded-[8px] shadow p-3">
                        <i class="bi bi-cash text-7xl text-red-600"></i>
                        <h3 class="text-2xl my-3 font-bold">Envoyer les paiements</h3>
                        <p class="mt-2">
                            Une fois le plan est selectionné, clicker sur l'élément du menu <b>Investir</b> et ensuite payer
                            le montant dû.
                    </div>
            </section>

        </div>
    </section>
@endsection
