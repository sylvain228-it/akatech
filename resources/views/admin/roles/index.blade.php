@extends('admin.layout.app')
@section('title')
    Liste de rôles
@endsection
@section('content')
    <div class="container mt-4 col-md-6 mx-auto shadow p-4">
        <h2>Liste des rôles</h2>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Ajouter un rôle</a>



        <div class="card p-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $perm)
                                    <span class="badge bg-info text-dark">{{ $perm->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        @can('delete roles')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        @endcan
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
