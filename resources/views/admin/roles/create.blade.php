@extends('admin.layout.app')
@section('title')
    Ajouter rôle
@endsection
@section('content')
    <div class="container mt-4 col-md-6 mx-auto shadow p-4">
        <h2>Créer un nouveau rôle</h2>

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
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du rôle</label>
                    <input type="text" name="name" class="form-control" placeholder="Ex: administrateur">
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissions</label><br>
                    @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                class="form-check-input" id="perm_{{ $permission->id }}">
                            <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                @can('create roles')
                    <button type="submit" class="btn btn-success">Créer</button>
                @endcan
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
