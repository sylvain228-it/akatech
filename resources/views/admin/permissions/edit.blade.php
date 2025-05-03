@extends('admin.layout.app')
@section('title')
    Modifier permission
@endsection
@section('content')
    <div class="container mt-4 col-md-6 mx-auto shadow p-4">
        <h2>Modifier la permission : {{ $permission->name }}</h2>

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

            <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la permission</label>
                    <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                </div>

                @can('edit permissions')
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                @endcan
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>

@endsection
