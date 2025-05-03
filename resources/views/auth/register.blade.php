@extends('auth.layout')
@section('title')
    Inscription
@endsection
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-primary/50 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-2 md:p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Inscription</h2>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="mt-1 w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="mt-1 w-full px-4 py-2 border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot
                        de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 w-full px-4 py-2 border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        S'inscrire
                    </button>
                </div>

                <div class="flex items-center gap-3">
                    <label class="inline-flex items-center">
                        <span class="ml-2 text-sm text-gray-700">Déja un compte?</span>
                    </label>
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                        Se connecter
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
