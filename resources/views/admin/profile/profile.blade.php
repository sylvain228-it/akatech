@extends('admin.layout.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="col-md-8 mx-auto shadow card p-5">
        <h4 class="text-2xl font-bold text-center text-gray-800 mb-6">Informations personnelles</h4>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="login" class="form-label">Nom</label>
                <input type="text" name="name" placeholder="Nom" id="name"
                    value="{{ old('name', Auth::user()->name) }}" required class="form-control">
                @error('name')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Prénom</label>
                <input type="text" placeholder="Prénom" name="fname" id="fname"
                    value="{{ old('fname', Auth::user()->fname) }}" class="form-control">
                @error('fname')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="number" name="phone" placeholder="Numéro" id="phone"
                    value="{{ old('phone', Auth::user()->phone) }}" required class="form-control">
                @error('phone')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="" disabled readonly name="" placeholder="Adresse email" id="email"
                    value="{{ old('email', Auth::user()->email) }}" required class="form-control">
                @error('email')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="adresse" name="adresse" id="adresse" value="{{ old('adresse', Auth::user()->adresse) }}"
                    class="form-control">
                @error('adresse')
                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full btn btn-primary">
                Enregistrer les modifications
            </button>
        </form>


        {{-- CHANGEMENT DE MOT DE PASSE --}}
        <form action="{{ route('admin.password.reset') }}" class="mt-5" method="POST">
            @csrf
            @method('PUT')
            <hr class="my-4">

            <h5 class="text-2xl text-gray-700 font-medium mb-3">Paramètre de sécurité</h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-3">
                    <label class="form-label text-gray-700">Mot de passe actuel</label>
                    <input type="password" name="current_password" required
                        class="form-control @error('current_password') is-invalid @enderror">
                    @error('current_password')
                        <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label text-gray-700">Nouveau mot de passe</label>
                    <input type="password" name="new_password" required
                        class="form-control @error('new_password') is-invalid @enderror">
                    @error('new_password')
                        <p class="text-danger text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label text-gray-700">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="new_password_confirmation" required class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary">
                Changer
            </button>
        </form>
    </div>
@endsection
