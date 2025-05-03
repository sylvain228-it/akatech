@extends('admin.layout.app')
@section('title')
    Ajouter Carousel
@endsection
@section('content')
    <h1 class="mt-4">Ajouter Carousel
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-danger float-end">Retour</a>
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Carousel</li>
    </ol>
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                            placeholder="Titre" id="">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea name="description" placeholder="Description" class="form-control" id="">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Position de l'image</label>
                        <select name="img_pos" id="" class="form-select">
                            <option value="default" selected hidden>Selectionner une position</option>
                            <option value="default">Par défaut (Centrée)</option>
                            <option value="left">A gauche</option>
                            <option value="center">Centrée</option>
                            <option value="right">A droite</option>
                            <option value="top">En haut</option>
                            <option value="bottom">En bas</option>
                        </select>
                        @error('img_pos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link" class="form-control" value="{{ old('link') }}"
                            placeholder="Lien" id="link">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="link_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link_text" class="form-control" value="{{ old('link_text') }}"
                            placeholder="Texte du lien" id="link_text">
                        @error('link_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="text_link_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link2" class="form-control" value="{{ old('link2') }}"
                            placeholder="Lien 2" id="link2">
                        @error('link2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="link2_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link2_text" class="form-control" value="{{ old('link2_text') }}"
                            placeholder="Texte du lien 2" id="link2_text">
                        @error('link2_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="text2_link_error"></span>
                    </div>
                    <button class="btn btn-primary float-end" id="btn-submit" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#btn-submit').on('click', function(event) {
                event.preventDefault();
                if ($('#link').val() != "" && $('#link_text').val() == "") {
                    $('#text_link_error').text("Ce champ est requis");
                } else if ($('#link').val() == "" && $('#link_text').val() != "") {
                    $('#link_error').text("Ce champ est requis");
                } else {
                    $('#form').submit();
                }

            })
        })
    </script>
@endsection
