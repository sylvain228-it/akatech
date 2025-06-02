@extends('admin.layout.app')
@section('title')
    Service
@endsection
@section('content')
    <h1 class="mt-4">Ajouter un service
        <a href="{{ route('admin.services.index') }}" class="btn btn-danger float-end">Retour</a>
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Services</li>
    </ol>
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" required class="form-control" placeholder="Titre du service"
                            id="">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="price" class="form-control" placeholder="Montant du service"
                            id="">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea name="content" id="summernote" class="form-control"></textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Couverture</label>
                        <input type="file" name="cover" class="form-control" id="">
                        @error('cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary float-end" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Description du service',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    // ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                lang: "fr-FR"
            });
        })
    </script>
@endsection
