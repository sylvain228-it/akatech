@extends('admin.layout.app')
@section('title')
    Ajouter permission
@endsection
@section('content')
    <div class="container mt-4 col-md-6 mx-auto shadow p-4">
        <h2>Créer une permission</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4">
            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la permission</label>
                    <input type="text" name="name" class="form-control" placeholder="Ex : edit articles">
                </div>

                @can('create permissions')
                    <button type="submit" class="btn btn-success">Créer</button>
                @endcan
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
