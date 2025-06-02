<?php
$navbarItems = [
    ['title' => 'Carousel', 'route' => 'admin.carousel.index', 'icon'=>''],
    ['title' => 'Services', 'route' => 'admin.services.index', 'icon'=>''],
    ['title' => 'Teams', 'route' => 'admin.teams.index','icon'=>''],
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
                <a class="nav-link" href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
            @endforeach

        </div>
    </div>
</nav>
