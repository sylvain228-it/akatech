@extends('admin.layout.app')
@section('title')
    Modifier rôle
@endsection
@section('content')
    <div class="container mt-4 col-md-6 mx-auto shadow p-4">
        <h2>Modifier le rôle : {{ $role->name }}</h2>

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
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du rôle</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissions</label><br>
                    @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                class="form-check-input" id="perm_{{ $permission->id }}"
                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                @can('edit roles')
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                @endcan
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
