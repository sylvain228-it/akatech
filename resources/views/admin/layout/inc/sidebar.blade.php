<?php
$navbarItems = [
    // ['title' => 'Catégories', 'items' => [['title' => 'Liste', 'route' => 'admin.categories.index', 'icon' => '']]]
    ['title' => 'Carousel', 'items' => [['title' => 'Carousels', 'route' => 'admin.carousel.index', 'icon' => '']]],
];
?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav pb-3">
            <hr>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <hr>
            {{-- navitems --}}
            @foreach ($navbarItems as $item)
                @foreach ($item['items'] as $elem)
                    <a class="nav-link" href="{{ route($elem['route']) }}">{{ $elem['title'] }}</a>
                @endforeach
            @endforeach

        </div>
    </div>
</nav>
