@extends('auth.layout')
@section('title')
    Vérification de l'adresse e-mail
@endsection
@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Vérification de l'adresse e-mail</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm" id="success-msg">
                    {{ session('status') }}
                </div>
            @endif

            <p class="text-gray-600 mb-6">
                Avant de continuer, veuillez vérifier votre e-mail pour le lien de confirmation.
                Si vous n'avez pas reçu le mail, cliquez ci-dessous pour en renvoyer un.
            </p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Renvoyer le lien
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="text-sm text-gray-500 hover:underline">
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>
@endsection
