@extends('admin.layout.app')
@section('title')
    Images Carousel préview
@endsection

@section('content')
    <div class="owl-carousel owl-theme">
        @foreach ($imagesCarousel as $carousel)
            @include('carousel-item')
        @endforeach
    </div>
    <hr>
    <a href="{{ route('admin.carousel.index') }}" class="btn btn-danger float-end">Retour</a>
@endsection

@section('script')
    <script>
        // owl-carousel
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            pagination: false,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
            },
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            checkVisibility: false,
        });
        $(".play").on("click", function() {
            owl.trigger("play.owl.autoplay", [1000]);
        });
        $(".stop").on("click", function() {
            owl.trigger("stop.owl.autoplay");
        });
    </script>
@endsection
