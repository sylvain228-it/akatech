<div
    style="background-image: url('{{ asset('storage/' . $carousel->image) }}'); background-repeat:no-repeat; background-size: {{ 'cover' }}; background-position: 
        @if ($carousel->img_pos == 'center' || $carousel->img_pos == 'default') center;
    @else
    {{ $carousel->img_pos }} @endif
        ;">
    <div class="w-full bg-black/40 p-6 sm:p-10 lg:p-16">
        <div class="sm:max-w-[90%] lg:max-w-[60%] flex justify-start">
            <div class="text-left">
                <div class="text-white mb-10">
                    <h1
                        class="font-bold capitalize text-2xl md:text-4xl font-[verdana] tracking-wide md:leading-13 leading-9">
                        {{ $carousel->title }}
                    </h1>
                    <p class="mt-10 tracking-wide leading-6">{{ $carousel->description }}</p>
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
