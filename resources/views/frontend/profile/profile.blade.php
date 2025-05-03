@extends('frontend.profile.layout')
@section('title')
    Profile
@endsection
@section('content')
    <div class="max-w-3xl mx-auto bg-white p-2 md:p-6 rounded-2xl shadow">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center">

            <form action="{{ route('profile.updatePhoto') }}" class="mb-5 order-last md:order-first" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Photo profile</label>
                    <input type="file" name="photo_profile"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('photo_profile') border-red-500 @enderror">
                    @error('photo_profile')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                        class="w-32 cursor-pointer mt-3 bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        Modifier
                    </button>
                </div>
            </form>
            <div class="flex justify-center">
                <a href="{{ auth()->user()->photo_profile ? asset('storage/' . auth()->user()->photo_profile) : '#' }}">
                    <img class="w-[150px] h-[150px] object-cover rounded-[100%]"
                        src="{{ auth()->user()->photo_profile ? asset('storage/' . auth()->user()->photo_profile) : asset('assets/avatar-1.png') }}"
                        alt="">
                </a>
            </div>
        </div>
        <hr class="my-4">
        {{-- FORMULAIRE DE MISE À JOUR DES INFOS --}}
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <h3 class="text-2xl text-gray-700 font-medium mb-3">Informations personnelles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="fname" value="{{ old('fname', auth()->user()->fname) }}"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('fname') border-red-500 @enderror">
                    @error('fname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse', auth()->user()->adresse) }}"
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('adresse') border-red-500 @enderror">
                    @error('adresse')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>



            <button type="submit"
                class="w-full cursor-pointer bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                Enregistrer les modifications
            </button>
        </form>

        <form action="{{ route('profile.resetPass') }}" class="mt-5" method="POST">
            @csrf
            @method('PUT')
            <hr class="my-4">

            {{-- CHANGEMENT DE MOT DE PASSE --}}
            <h3 class="text-2xl text-gray-700 font-medium mb-3">Paramètre de sécurité</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                    <input type="password" name="current_password" required
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" name="new_password" required
                        class="mt-1 w-full border rounded-lg px-4 py-2 @error('new_password') border-red-500 @enderror">
                    @error('new_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="new_password_confirmation" required
                        class="mt-1 w-full border rounded-lg px-4 py-2">
                </div>
            </div>

            <button type="submit"
                class="w-32 cursor-pointer bg-blue-600 my-3 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                Changer
            </button>
        </form>
    </div>
@endsection
