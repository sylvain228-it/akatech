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
                <h1 class="text-4xl font-bold text-indigo-700 mb-6">À propos de nous</h1>
                <p class="text-gray-700 text-lg mb-4">
                    Nous sommes une entreprise dédiée à rendre les investissements accessibles à tous, grâce à une
                    plateforme simple, sécurisée et rapide.
                </p>
                <p class="text-gray-700 text-lg mb-4">
                    Notre mission est de démocratiser les services financiers, en intégrant les paiements mobiles locaux
                    comme <strong>TMoney</strong> et <strong>Flooz</strong>, afin de garantir une inclusion maximale.
                </p>
                <p class="text-gray-700 text-lg">
                    Avec une équipe passionnée et expérimentée, nous nous engageons à vous offrir un accompagnement de
                    qualité, une plateforme intuitive et une expérience client exceptionnelle.
                </p>
            </div>

            <div class="text-center">
                <img src="{{ asset('assets/fro-tr.jpg') }}" alt="À propos" class="rounded-xl shadow-md mx-auto">
            </div>
        </div>
    </section>
@endsection
