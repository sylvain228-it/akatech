@extends('admin.layout.app')
@section('title')
    Investisseurs
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Investisseurs table <b class="badge bg-primary">{{ $users->count() }}</b>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Classe</th>
                            <th>Transactions</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Classe</th>
                            <th>Transactions</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>

                                    <a href="{{ $item->photo_profile ? asset('storage/' . $item->photo_profile) : '#' }}"><img
                                            src="{{ $item->photo_profile ? asset('storage/' . $item->photo_profile) : asset('assets/avatar-1.png') }}"
                                            alt=""
                                            style="height: 50px; width: 50px; object-fit: cover; border-radius: 100%;"></a>

                                </td>
                                <td><a href="{{ route('admin.user.show', $item->email) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->fname }}</td>
                                <td>+228 {{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a class="bg-primary-subtle p-2"
                                        href="{{ $item->userClasse ? route('admin.classes.show', $item->userClasse->classe->slug) : '#' }}">{{ $item->userClasse ? $item->userClasse->classe->title : 'Pas encore' }}</a>
                                </td>
                                <td><a href="{{ route('admin.user.trans', $item->email) }}">Voir</a></td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.user.show', $item->email) }}"
                                            class="btn border-0 btn-sm btn-info"><i class="bi bi-eye"></i></a>

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
