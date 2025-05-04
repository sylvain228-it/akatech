<div class="bg-white z-[777] shadow-xl flex lg:py-0 py-4 items-center justify-between">
    <a href="{{ url('/') }}" class="lg:ms-7 ms-4 me-4">
        <div class="flex gap-2 items-center">
            <img src="{{ asset('assets/logo_bg.png') }}" class="w-[32px] lg:w-[56px] h-[32px] lg:h-[56px] object-cover"
                alt="">
            <div class="block sm:hidden xl:block">

                <h5
                    class="mt-0 text-xl font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryYe to-primaryB">
                    Technologies</h5>
                <h3
                    class="text-xl font-bold mb-0 bg-gradient-to-r bg-clip-text text-transparent from-primaryB to-primaryYe">
                    Avancées</h3>
            </div>
        </div>
    </a>
    {{-- menu open --}}
    <div class="lg:hidden mx-4">
        <i class="bi bi-list text-gray-800 text-3xl cursor-pointer" id="menu-open"></i>
    </div>
    {{-- fin --}}
    <nav class="xl:me-24 lg:me-16 hidden lg:block ms-auto nav-menu py-7 w-full">
        <ul class="gap-x-7 flex text-black font-[600] font-[Poppins] uppercase items-center text-[14px]">
            <li><a href="{{ url('/') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('/') ? 'nav-active' : '' }}">Accueil</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">A
                    propos</a></li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">Services</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">Portfolio</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">Formations</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">Boutique</a>
            </li>
            <li><a href="{{ route('about') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('about') ? 'nav-active' : '' }}">Blog</a>
            </li>
            <li><a href="{{ route('contact') }}"
                    class="transition-all duration-300 ease-in-out {{ Request::is('contact') ? 'nav-active' : '' }}">Contact</a>
            </li>
            @guest
                <li><a href="{{ route('login') }}" class="transition-all duration-300 ease-in-out">Se connecter</a>
                </li>
            @endguest
            @auth

                <div class="relative inline-block text-left">
                    <button id="dropdownBtn" type="button"
                        class="inline-flex justify-center text-gray-300 transition-all duration-300 ease-in-out cursor-pointer">
                        <i class="bi bi-person-circle text-3xl"></i>
                    </button>

                    <div id="dropdownMenu"
                        class="origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                        <div class="py-1 text-gray-700" role="menu" aria-orientation="vertical"
                            aria-labelledby="dropdownBtn">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-100"
                                role="menuitem">{{ Auth::user()->name }}</a>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-100 {{ Request::is('client/profile') ? 'nav-active' : '' }}"
                                role="menuitem">Profil</a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-red-500 cursor-pointer hover:underline">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </ul>
    </nav>
</div>

{{-- menu mobile --}}
<div class="h-full w-full bg-[rgba(0,0,0,0.3)] fixed z-[888] top-0 lg:hidden -translate-x-full transition-all duration-300 ease-in-out"
    id="content-overlay">
</div>

<div class="h-full overflow-y-scroll fixed top-0 right-0 bg-white z-[999] lg:hidden translate-x-full transition-all duration-300 ease-in-out"
    id="menu-mobile">

    <i class="bi bi-x-circle text-3xl m-3 cursor-pointer text-red-400" id="menu-close"></i>
    <ul class="uppercase gap-y-4 flex flex-col my-5 px-14 text-left">
        <li class=""><a href="{{ url('/') }}"
                class="nav-link {{ Request::is('/') ? 'nav-active' : '' }}">Accueil</a>
        </li>

        <li class=""><a href="{{ route('about') }}" class=" {{ Request::is('about') ? 'nav-active' : '' }}">A
                propos</a>
        </li>
        <li class=""><a href="{{ route('about') }}"
                class=" {{ Request::is('about') ? 'nav-active' : '' }}">Services</a>
        </li>
        <li class=""><a href="{{ route('about') }}"
                class=" {{ Request::is('about') ? 'nav-active' : '' }}">Portfolio</a>
        </li>
        <li class=""><a href="{{ route('about') }}"
                class=" {{ Request::is('about') ? 'nav-active' : '' }}">Formations</a>
        </li>
        <li class=""><a href="{{ route('about') }}"
                class=" {{ Request::is('about') ? 'nav-active' : '' }}">Boutique</a>
        </li>
        <li class=""><a href="{{ route('about') }}"
                class=" {{ Request::is('about') ? 'nav-active' : '' }}">Blog</a>
        </li>
        <li class=""><a href="{{ route('contact') }}"
                class="nav-link {{ Request::is('contact') ? 'nav-active' : '' }}">Contact</a>
        </li>

        @guest
            <li class="mt-3 w-full"><a
                    class="text-[15px] w-full rounded-[8px] nav-link {{ Request::is('login') ? 'nav-active' : '' }} cursor-pointer uppercase  transition-all duration-300 ease-in-out border-2 border-primaryB bg-transparent px-3 py-2"
                    href="{{ route('login') }}">Se connecter</a></li>
        @endguest

        @auth
            <li class=""><a href="{{ route('profile') }}"
                    class="nav-link {{ Request::is('client/profile') ? 'nav-active' : '' }}">Mon
                    profil</a></li>

            <li class=""><a href="{{ route('dashboard') }}"
                    class="nav-link {{ Request::is('client/dashboard') ? 'nav-active' : '' }}">Tableau
                    de bord</a></li>


            <li class=""><a href="{{ route('guides') }}"
                    class="nav-link {{ Request::is('client/guides') ? 'nav-active' : '' }}">Guides</a>
            </li>
            <li class="">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-red-500 cursor-pointer">Déconnexion</button>
                </form>
            </li>
        @endauth
    </ul>
    <hr class="my-2 text-gray-400">

    <div class="p-4 mobile-info">
        <div class="flex gap-2 items-center mb-3">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
                <p><span>Notre centre</span></p>
                <p><a href="">Lomé Togo, Vakpossito,</a></p>
            </div>
        </div>
        <div class="flex gap-2 items-center mb-3">
            <i class="bi bi-telephone-inbound-fill "></i>
            <div>
                <p><span>Appelez-nous</span></p>
                <p><a href="tel:+22899509353">(+228) 99 50 93 53</a> /</p>
                <p><a href="tel:+22893571279">(+228) 93 57 12 79</a></p>
            </div>
        </div>
        <div class="flex gap-2 items-center mb-3">
            <i class="bi bi-envelope"></i>
            <div>
                <p><span>Ecrivez-nous</span></p>
                <p><a href="mailto:info@akatech-tg.com">info@akatech-tg.com</a> /</p>
                <p><a href="mailto:support@akatech-tg.com">support@akatech-tg.com</a></p>
            </div>
        </div>
    </div>
</div>


<script>
    const menuMobile = document.getElementById("menu-mobile");
    const contentOverlay = document.getElementById("content-overlay");
    const elementLink = $(".nav-link");
    if (window.innerWidth > 768) {

        const btn = document.getElementById('dropdownBtn');
        const menu = document.getElementById('dropdownMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    }

    elementLink.on("click", function(event) {
        console.log(this.textContent);
        menuMobile.classList.add("-translate-x-full");
        contentOverlay.classList.add("-translate-x-full");
    });
</script>
