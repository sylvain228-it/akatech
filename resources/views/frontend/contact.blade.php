@extends('frontend.layout.app')
@section('title')
    Contact
@endsection
<style>
    .c-card {
        background: url("{{ asset('default/fond-texture-.jpg') }}") no-repeat center/cover;
        border-radius: 20px;
    }
</style>
@section('content')
    @php
        $title = 'Nous contacter';
    @endphp
    @include('frontend.layout.inc.banner')
    <section class="bg-white min-h-screen py-12">
        <div class="max-w-5xl mx-auto px-6 flex flex-col gap-8 items-center justify-center">

            <div>
                <div class="flex gap-1 items-center justify-center mb-3">
                    <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                    <h5 class="text-[15px] text-primaryB uppercase font-medium">Notre équipe est à votre écoute.
                    </h5>
                    <div class="w-10 h-1 bg-gradient-to-r from-primaryB from-10% via-10% via-white to-primaryB to-80%">
                    </div>
                </div>
                <h1 class="text-3xl font-bold mb-2 text-center">Prenez contact avec nous sans hésitation.</h1>
                <p class="text-gray-700 mb-6 text-center">Chez nous, l’informatique n’est pas qu’une question de technologie,
                    c’est avant tout une affaire de service.</p>

                <form class="bg-gray-100 p-6 rounded-xl shadow-md space-y-5" id="contactForm" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
                        <div>
                            <label class="block text-gray-600 mb-1">Nom complet</label>
                            <input type="text" name="name" value="{{ Auth::user() ? Auth::user()->name : '' }}"
                                placeholder="Votre nom"
                                class="w-full px-4 py-3 rounded-lg border focus:outline-0 focus:border-0 focus:ring-2 focus:ring-indigo-400">
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Email</label>
                            <input type="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}"
                                placeholder="votremail@example.com"
                                class="w-full px-4 py-3 rounded-lg border focus:outline-0 focus:border-0 focus:ring-2 focus:ring-indigo-400">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1">Sujet</label>
                        <input type="text" name="sujet" value="" placeholder="Sujet"
                            class="w-full px-4 py-3 rounded-lg border focus:outline-0 focus:border-0 focus:ring-2 focus:ring-indigo-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1">Message</label>
                        <textarea rows="6" name="message" placeholder="Votre message..."
                            class="w-full px-4 py-3 rounded-lg border focus:outline-0 focus:border-0 focus:ring-2 focus:ring-indigo-400"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-primaryB font-bold text-xl text-white px-6 py-3 rounded-lg hover:bg-primaryYe transition duration-150 hover:scale-95 translate w-full">Envoyer</button>

                    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded hidden" id="success-msg">

                    </div>
                    <div class="mb-4 bg-red-100 text-red-700 p-3 rounded hidden" id="error-msg">

                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="my-20">
        <div class="bg-primaryB shadow-lg rounded-2xl">
            <iframe class="w-full min-h-[450px] rounded-2xl"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3328713004303!2d1.1618334737277427!3d6.219762026621085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021590005102281%3A0x8cd1cc1b8b0bdba8!2sVakpossito!5e0!3m2!1sen!2stg!4v1746711607175!5m2!1sen!2stg"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>
        <div class="-mt-20 w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-7 px-5 md:px-20 justify-center">

                <div class="c-card" data-aos="zoom-in">
                    <div
                        class="p-5 h-[300px] w-full bg-gris1/60 rounded-[20px] text-white flex flex-col items-center justify-center">
                        <div
                            class="w-16 h-16 mb-3 bg-primaryB flex flex-col items-center justify-center rounded-[100%] text-white text-2xl ">
                            <i class="bi bi-envelope-at"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Ecrivez nous</h3>

                        <p class="mt-3 mb-2 font-medium">
                            <a href="mailto:info@akatech-tg.com">info@akatech-tg.com</a>
                        </p>
                        <p class="mb-3 font-medium">
                            <a href="mailto:support@akatech-tg.com">support@akatech-tg.com</a>
                        </p>
                    </div>
                </div>
                <div class="c-card" data-aos="zoom-in">
                    <div
                        class="p-5 h-[300px] w-full bg-gris1/60 rounded-[20px] text-white flex flex-col items-center justify-center">
                        <div
                            class="w-16 h-16 mb-3 bg-primaryB flex flex-col items-center justify-center rounded-[100%] text-white text-2xl ">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Visitez nous</h3>
                        <p class="mt-3 mb-2 font-medium">
                            <a href="">Lomé Togo, Vakpossito,</a>
                        </p>
                    </div>
                </div>
                <div class="c-card" data-aos="zoom-in">
                    <div
                        class="p-5 h-[300px] w-full bg-gris1/60 rounded-[20px] text-white flex flex-col items-center justify-center">
                        <div
                            class="w-16 h-16 mb-3 bg-primaryB flex flex-col items-center justify-center rounded-[100%] text-white text-2xl ">
                            <i class="bi bi-telephone-inbound"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Appelez nous</h3>

                        <p class="mt-3 mb-2">
                            <a href="tel:+22899509353" class="font-medium">(+228) 99 50 93 53</a>
                        </p>
                        <p class="mb-3">
                            <a href="tel:+22893571279" class="font-medium">(+228) 93 57 12 79</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-20">
        @include('frontend.layout.inc.tech-icons')
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
