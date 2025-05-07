<div data-aos="zoom-down"
    class="bg-primaryB sm:px-24 px-10 py-14 sm:py-18 grid grid-cols-1 md:grid-cols-2 gap-7 text-white items-center">
    <h3 class="text-2xl font-bold">Abonnez-vous à notre newsletter
        pour obtenir nos dernières mises à jour</h3>
    <div class=" bg-white">
        <form action="" id="newsletterForm">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 p-3">
                <input type="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}"
                    placeholder="votremail@example.com" class="w-full px-4 py-2 border-0 focus:outline-none text-black">

                <button type="submit"
                    class="bg-primaryB text-white px-6 py-2 rounded-lg hover:bg-secondB transition">S'abonner</button>
            </div>

            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded hidden" id="success-msg">

            </div>
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded hidden" id="error-msg">

            </div>
        </form>
    </div>
</div>
