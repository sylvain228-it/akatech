@extends('frontend.layout.app')
@section('title')
    Contact
@endsection
@section('content')
    @php
        $title = 'Nous contacter';
    @endphp
    @include('frontend.layout.inc.banner')
    <section class="bg-white min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <div class="text-center">
                <img src="{{ asset('assets/afro_bus.jpg') }}" alt="Contact" class="rounded-xl shadow-md mx-auto">
            </div>


            <div>
                <h1 class="text-4xl font-bold text-indigo-700 mb-6">Contactez-nous</h1>
                <p class="text-gray-700 mb-6">Une question ? Un souci avec votre abonnement ? N'hésitez pas à nous écrire via
                    ce formulaire.</p>

                <form class="bg-gray-100 p-6 rounded-xl shadow-md space-y-5" id="contactForm" method="POST">
                    <div>
                        <label class="block text-gray-600 mb-1">Nom complet</label>
                        <input type="text" name="name" value="{{ Auth::user() ? Auth::user()->name : '' }}"
                            placeholder="Votre nom"
                            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}"
                            placeholder="votremail@example.com"
                            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1">Sujet</label>
                        <input type="text" name="sujet" value="" placeholder="Sujet"
                            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1">Message</label>
                        <textarea rows="4" name="message" placeholder="Votre message..."
                            class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-400"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">Envoyer</button>

                    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded hidden" id="success-msg">

                    </div>
                    <div class="mb-4 bg-red-100 text-red-700 p-3 rounded hidden" id="error-msg">

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.getElementById("contactForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const form = e.target;
            const data = {
                name: form.name.value.trim(),
                email: form.email.value.trim(),
                sujet: form.sujet.value.trim(),
                message: form.message.value.trim(),
            };
            const errorMsg = document.getElementById("error-msg");
            const successMsg = document.getElementById("success-msg");


            if (!data.name || !data.email || !data.sujet || !data.message) {
                errorMsg.classList.remove("hidden");
                errorMsg.innerText = "Tous les champs sont requis.";
                return;
            }

            fetch("/contact", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(data),
                })
                .then((response) => response.json())
                .then((result) => {
                    errorMsg.classList.add("hidden");
                    successMsg.classList.remove("hidden");
                    successMsg.innerText = result.message;
                    form.reset();
                })
                .catch((error) => {
                    errorMsg.classList.remove("hidden");
                    successMsg.classList.add("hidden");
                    errorMsg.innerText = "Une erreur est survenue.";
                    console.error(error);
                });
        });

        // fin
    </script>
@endsection
