@extends('admin.layout.app')
@section('title')
    Voir Image Carousel
@endsection

@section('content')
    @include('carousel-item')
    <hr>
    <div class="d-flex gap-5 float-end">
        <a href="{{ route('admin.carousel.index') }}" class="btn btn-danger float-end">Retour</a>
        <a href="{{ route('admin.carousel.edit', $carousel->id) }}" class="btn btn-primary float-end">Modifier</a>

    </div>
@endsection
