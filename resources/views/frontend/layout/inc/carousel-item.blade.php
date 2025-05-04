<div
    style="background-image: url('{{ asset('storage/' . $carousel->image) }}'); background-repeat:no-repeat; background-size: {{ 'cover' }}; background-position: 
        @if ($carousel->img_pos == 'center' || $carousel->img_pos == 'default') center;
    @else
    {{ $carousel->img_pos }} @endif
        ;">
    <div class="w-full bg-black/40 p-6 sm:p-10 lg:p-16">
        <div class="sm:max-w-[90%] xl:max-w-[60%] lg:max-w-[70%] flex justify-start">
            <div class="text-left">
                <div class="text-white mb-10">
                    <div class="max-h-[270px]">
                        <h1
                            class="font-bold capitalize text-2xl md:text-4xl font-[verdana] tracking-wide md:leading-13 leading-9">
                            {{-- {{ $carousel->title }} --}}
                            Le soir tombe lentement, enveloppant le monde d’une lumière douce et dorée.
                        </h1>
                    </div>
                    <div class="max-h-[250px]">
                        <p class="mt-10 tracking-wide leading-6">
                            {{-- {{ $carousel->description }} --}}
                            Le soleil se couche lentement sur l’horizon, peignant le ciel de teintes dorées et pourpres.
                            Les
                            oiseaux rentrent au nid, tandis que le vent souffle doucement à travers les arbres. Un
                            instant
                            de paix, suspendu dans le temps, où tout semble possible.
                        </p>
                    </div>
                </div>
                @if ($carousel->link != null || $carousel->link2 != null)
                    <div class="flex gap-3 my-8 home-b-link">
                        @if ($carousel->link != null)
                            <a class="transition ease-in-out duration-300 hover:scale-95"
                                href="{{ $carousel->link }}">{{ $carousel->link_text }}</a>
                        @endif
                        @if ($carousel->link2 != null)
                            <a class="transition ease-in-out duration-300 hover:scale-95"
                                href="{{ $carousel->link2 }}">{{ $carousel->link2_text }}</a>
                        @endif
                    </div>
                @endif
            </div>
            <style>
                .home-b-link a:first-child {
                    background-color: var(--color-primaryB);
                }

                .home-b-link a {
                    background-color: var(--color-primaryYe);
                    font-size: 16px;
                    padding: 10px 14px;
                    border-radius: 5px;
                    text-transform: uppercase;
                    color: white;
                }
            </style>
        </div>
    </div>
</div>
