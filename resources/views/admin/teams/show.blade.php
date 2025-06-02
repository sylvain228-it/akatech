@extends('admin.layout.app')
@section('title')
    Service
@endsection
@section('content')
    <h1 class="mt-4">Info du service
        <a href="{{ route('admin.services.index') }}" class="btn btn-danger float-end">Retour</a>
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Services</li>
    </ol>
    <div class="col-md-8 mx-auto">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h4>{{ $service->title }}
                    <span class="float-end">{{ $service->price }} FCFA</span>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <a href="{{ asset('storage/' . $service->cover) }}">
                        <img src="{{ asset('storage/' . $service->cover) }}" class="img-fluid"
                            style="height: 300px; width:100%; object-fit:cover;" alt="">
                    </a>
                </div>

                <div class="mb-3">
                    {{ $service->description }}
                </div>
                <div class="mb-3">
                    {!! $service->content !!}
                </div>


            </div>
            <hr>
            <a href="{{ route('admin.services.edit', $service->slug) }}" class="btn btn-primary float-end"
                type="submit">Modifier</a>
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
