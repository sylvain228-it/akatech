<div
    class="w-full md:p-5 lg:h-[90vh] grid grid-col-1 md:grid-cols-2 justify-between items-center bg-gradient-to-r from-[#4629f8] to-[#30007b]">
    <div class="banner-bg">
        <div class="p-10 bg-overlay ">
            <div class="p-2 mb-5 rounded-[20px] inline-block bg-primary text-gray-300">
                <p><span class="h-10 w-10 rounded-[100%] bg-secondary"><i class="bi bi-currency-dollar"></i></span>
                    Facilitez la gestion de vos contributions avec notre solution digitale locale !
                </p>
            </div>
            <h3 class="text-3xl mb-4 font-bold font-[verdana] text-gray-100">Investissez facilement selon votre classe
                (Silver, Gold, Premium..) via TMoney et Flooz.</h3>

            <p class="font-[verdana] text-gray-200 my-8">Nous simplifions vos paiements d’investissement grâce à une
                plateforme moderne, sécurisée et adaptée aux moyens de paiement du Togo.</p>

            <div class="flex-col md:flex-row flex gap-7">
                @guest
                    <a class="text-[13px] md:text-[15px] text-center rounded-[20px] transition-all duration-300 ease-in-out transform hover:scale-95 cursor-pointer uppercase font-bold text-gray-300 hover:text-white hover:bg-secondary border-2 border-secondary bg-primary p-3"
                        href="{{ route('login') }}">Se connecter</a></li>
                @endguest

            </div>
        </div>
    </div>
    <div class="mt-5 pt-8 hidden md:block">
        <img src="{{ asset('default/banner.webp') }}" class="w-full" alt="">
    </div>

</div>

<style>
    @media (max-width:600px) {
        .banner-bg {
            background-image: url({{ asset('default/banner.webp') }});
            background-position: left;
            background-size: cover;
            background-attachment: fixed;
        }

        .bg-overlay {
            background-color: rgba(65, 44, 190, 0.8);
        }
    }
</style>
