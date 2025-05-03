@extends('admin.layout.app')
@section('title')
    Investisseurs
@endsection
@section('content')
    <style>
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <div class="col-md-8 mx-auto mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Profil Utilisateur</h4>
                <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">Retour</a>

            </div>
            <div class="card-body row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="row text-center mb-4">
                        <div class="col">
                            <img src="{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : asset('assets/avatar-1.png') }}"
                                alt="Photo de profil" class="profile-img mb-2">
                            <h5 class="mt-2">{{ $user->name }} {{ $user->fname }}</h5>
                            <h5 class="bg-primary-subtle p-2 mt-3">
                                <a class=""
                                    href="{{ $user->userClasse ? route('admin.classes.show', $user->userClasse->classe->slug) : '#' }}">{{ $user->userClasse ? $user->userClasse->classe->title : 'Pas encore' }}</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <strong>Téléphone:</strong>
                        <p class="form-control-plaintext">{{ $user->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Adresse:</strong>
                        <p class="form-control-plaintext">{{ $user->adresse ?? 'Non renseignée' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
