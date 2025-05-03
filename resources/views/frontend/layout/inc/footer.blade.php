<div class="foot bg-gris1 flex flex-col tracking-[1px]">
    <div class="text-gray-300 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 justify-between items-start p-5">
        <div class="order-last md:order-first">
            <a href="{{ url('/') }}" class="mb-3">
                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/logo.png') }}" class="w-[100px] h-[100px] object-cover" alt="">
                    <div>

                        <h5
                            class="mt-0 text-xl font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryYe to-primaryB">
                            Technologies</h5>
                        <h3
                            class="text-xl font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryB to-primaryYe">
                            Avancées</h3>
                    </div>
                </div>

            </a>
            <p class="mt-2">Plus de 4 ans d’expertise en cybersécurité et développement web & mobile : nous
                transformons vos besoins
                en solutions sur mesure.</p>
            <div class="flex gap-4 mt-3 network">
                <div>
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                </div>
                <div>
                    <a href=""><i class="bi bi-facebook"></i></a>
                </div>
                <div>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <div>
                    <a href=""><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
        <div>
            <div class="mb-3">
                <h3 class="text-2xl text-gray-300 mb-2 font-medium">Liens rapides</h3>
                <div class="trait"></div>
            </div>
            <ul class="flex flex-col gap-3 text-gray-300">
                <li><a href="{{ route('about') }}" class="hover:text-white">A propos</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">Services</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">Portfolio</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">Formations</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">Boutique</a></li>
            </ul>
        </div>
        <div class="text-gray-300">
            <div class="mb-3">
                <h3 class="text-2xl text-gray-300 mb-2 font-medium">Nos Contacts</h3>
                <div class="trait"></div>
            </div>
            <p class="mb-3">
                <i class="bi bi-telephone-inbound-fill ">1</i>
                <a href="tel:+22899509353">(+228) 99 50 93 53</a>
            </p>
            <p class="mb-3">
                <i class="bi bi-telephone-inbound-fill ">2</i>
                <a href="tel:+22893571279">(+228) 93 57 12 79</a>
            </p>
            <p class="mb-3">
                <i class="bi bi-envelope">1</i>
                <a href="mailto:info@akatech-tg.com">info@akatech-tg.com</a>
            </p>
            <p class="mb-3">
                <i class="bi bi-envelope">2</i>
                <a href="mailto:support@akatech-tg.com">support@akatech-tg.com</a>
            </p>
            <p class="mb-3">
                <i class="bi bi-geo-alt-fill"></i>
                <a href="">Lomé Togo, Vakpossito,</a>
            </p>
        </div>
    </div>
    <div class="text-center bg-gris2 flex items-center justify-center p-3">
        <p class="text-center text-gray-300 text-[12px]">Copyright@ <b class="uppercase">AKA Technologies</b> - <i>Tout
                droit réservé</i> |
            {{ date('d-m-Y') }}</p>
    </div>
</div>
