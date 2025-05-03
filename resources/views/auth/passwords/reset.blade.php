@extends('auth.layout')
@section('title')
    Réinitialisation du mot de passe
@endsection
@section('content')
    <div class="flex justify-center items-center min-h-screen bg-primary/50">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-center text-gray-700">Réinitialiser le mot de passe</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-1">Adresse e-mail</label>
                    <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300  rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 mb-1">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 w-full px-4 py-2 border border-gray-300  rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 mb-1">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 w-full px-4 py-2 border border-gray-300  rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-200">
                        Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
