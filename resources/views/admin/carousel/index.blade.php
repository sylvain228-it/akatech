@extends('admin.layout.app')
@section('title')
    Images Carousel
@endsection

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Images Carousel</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Images Carousel table
            @if ($imagesCarousel->count() > 0)
                <a href="{{ route('admin.carousel.preview') }}" class="btn btn-info ms-5">Voir l'apperçu</a>
            @endif
            <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary float-end">Ajouter</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Lien</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Lien</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($imagesCarousel as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                        style="height: 50px; width:50px; border-radius:50%; object-fit:cover;">
                                </td>
                                <td>{{ substr($item->description, 0, 50) }}{{ strlen($item->description) > 50 ? '...' : '' }}
                                </td>
                                <td><a href="{{ $item->link }}">{{ $item->link_text }}</a></td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.carousel.show', $item->id) }}"
                                            class="btn border-0 btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('admin.carousel.edit', $item->id) }}"
                                            class="btn border-0 btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.carousel.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Voulez-vous supprimer ça?')"
                                                class="btn border-0 btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
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
