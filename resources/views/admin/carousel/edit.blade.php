@extends('admin.layout.app')
@section('title')
    Modifier Carousel
@endsection
@section('content')
    <h1 class="mt-4">Modifier Carousel
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-danger float-end">Retour</a>
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Carousel</li>
    </ol>
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('admin.carousel.update', $carousel->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" value="{{ $carousel->title }}" class="form-control"
                            placeholder="Titre" id="">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea name="description" placeholder="Description" class="form-control" id="">{{ $carousel->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <div class="my-2">
                            <a href="{{ asset('storage/' . $carousel->image) }}">
                                <img style="height: 150px" class="w-100 object-fit-cover img-fluid"
                                    src="{{ asset('storage/' . $carousel->image) }}" alt="">
                            </a>
                        </div>
                        <input type="file" name="image" class="form-control" id="">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Position de l'image</label>
                        <select name="img_pos" id="" class="form-select">
                            <option value="{{ $carousel->img_pos }}" hidden selected>
                                @if ($carousel->img_pos == 'default')
                                    Par défaut (Centrée)
                                @elseif ($carousel->img_pos == 'center')
                                    Centrée
                                @elseif ($carousel->img_pos == 'left')
                                    A gauche
                                @elseif ($carousel->img_pos == 'right')
                                    A droite
                                @elseif ($carousel->img_pos == 'top')
                                    En haut
                                @else
                                    En bas
                                @endif
                            </option>
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
                        <input type="text" name="link" class="form-control" value="{{ $carousel->link }}"
                            placeholder="Lien" id="link">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="link_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link_text" class="form-control" value="{{ $carousel->link_text }}"
                            placeholder="Texte du lien" id="link_text">
                        @error('link_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="text_link_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link2" class="form-control" value="{{ $carousel->link2 }}"
                            placeholder="Lien 2" id="link2">
                        @error('link2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="link2_error"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link2_text" class="form-control" value="{{ $carousel->link2_text }}"
                            placeholder="Texte du lien 2" id="link2_text">
                        @error('link2_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="text2_link_error"></span>
                    </div>
                    <button class="btn btn-primary float-end" id="btn-submit" type="submit">Modifier</button>
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
