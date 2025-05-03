@extends('auth.layout')
@section('title')
    Mot de passe oublié
@endsection
@section('content')
    <div class="flex justify-center items-center min-h-screen bg-primary/50">
        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Réinitialiser votre mot de passe</h2>

            @if (session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                    Envoyer le lien de réinitialisation
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                    Retour à la connexion
                </a>
            </div>
        </div>
    </div>
@endsection
