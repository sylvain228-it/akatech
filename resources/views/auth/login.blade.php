@extends('auth.layout')
@section('title')
    Connexion
@endsection
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-primary/50 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-2 md:p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion</h2>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700">Email ou Téléphone</label>
                    <input type="text" id="login" name="login" value="{{ old('login') }}" required
                        class="mt-1 w-full px-4 py-2 border @error('login') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('login')
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

                <div class="flex items-center justify-between">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                        Mot de passe oublié ?
                    </a>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        Se connecter
                    </button>
                </div>

                <div class="flex items-center gap-3">
                    <label class="inline-flex items-center">
                        <span class="ml-2 text-sm text-gray-700">Pas de compte?</span>
                    </label>
                    <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">
                        Créer
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
