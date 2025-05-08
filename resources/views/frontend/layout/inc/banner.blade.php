<div class=" bg-banner">
    <div class=" bg-black/60 w-full h-[300px] flex items-center justify-center">
        <div class="text-center">
            <h3 class="text-2xl text-white font-bold font-[verdana] uppercase">{{ $title }}</h3>
        </div>
    </div>
</div>

<style>
    .bg-banner {
        background-image: url("{{ asset('default/fond-tech.jpg') }}");
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
