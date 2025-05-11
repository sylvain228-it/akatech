@extends('admin.layout.app')
@section('title')
    Services
@endsection
@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Servces</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Servces table
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary float-end">Ajouter</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Couverture</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Couverture</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($services as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->cover) }}" alt=""
                                        style="height: 50px; width:50px; border-radius:50%; object-fit:cover;">
                                </td>
                                <td>A partir de {{ number_format($item->price, 0) }} FCFA</td>
                                <td>{{ substr($item->description, 0, 50) }}{{ strlen($item->description) > 50 ? '...' : '' }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.services.show', $item->slug) }}"
                                            class="btn border-0 btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('admin.services.edit', $item->slug) }}"
                                            class="btn border-0 btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.services.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn border-0 btn-sm btn-danger"><i
                                                    class="bi bi-trash3"
                                                    onclick="return confirm('Voulez-vous supprimer ce service ?')"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
