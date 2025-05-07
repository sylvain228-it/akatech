<div
    style="background-image: url('{{ asset('storage/' . $carousel->image) }}'); background-repeat:no-repeat; background-size: {{ 'cover' }}; background-position: 
        @if ($carousel->img_pos == 'center' || $carousel->img_pos == 'default') center;
    @else
    {{ $carousel->img_pos }} @endif
        ;">
    <div class="w-full bg-black/70">

        <div
            class="text-left flex flex-col sm:max-w-[90%] xl:max-w-[60%] lg:max-w-[70%] justify-start p-6 sm:p-10 lg:p-16 md:h-[500px] h-[450px]">
            <div class="text-white mb-10" data-aos="zoom-in">
                <h1
                    class="font-bold capitalize text-2xl md:text-4xl font-[verdana] tracking-wide md:leading-13 leading-9">
                    {{ $carousel->title }}
                </h1>
                <p class="mt-10 tracking-wide leading-6">
                    {{ $carousel->description }}
                </p>
            </div>
            @if ($carousel->link != null || $carousel->link2 != null)

                <div class="mt-auto" data-aos="fade-down">
                    <div class="flex flex-col sm:flex-row gap-6 mt-3 home-b-link">
                        @if ($carousel->link != null)
                            <div class="inline link1 mt-auto">
                                <a class="transition ease-in-out duration-300 hover:scale-95"
                                    href="{{ $carousel->link }}">{{ $carousel->link_text }}</a>
                            </div>
                        @endif
                        @if ($carousel->link2 != null)
                            <div class="inline sm:mt-0 link2 mt-6">
                                <a class="transition ease-in-out duration-300 hover:scale-95"
                                    href="{{ $carousel->link2 }}">{{ $carousel->link2_text }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
