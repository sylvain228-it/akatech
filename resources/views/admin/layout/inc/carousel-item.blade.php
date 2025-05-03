<div
    style="background-image: url('{{ asset($carousel->image) }}'); background-repeat:no-repeat; background-size: {{ 'cover' }}; background-position: 
        @if ($carousel->img_pos == 'center' || $carousel->img_pos == 'default') center;
    @else
    {{ $carousel->img_pos }} @endif
        ;">
    <div style="display: flex;justify-content: center; align-items: center; height: calc(100vh - 100px); width: 100%; background-color: rgba(0, 0, 0, 0.6);"
        class="p-3">
        <div class="sm:max-w-[96%] lg:max-w-[50%]">
            <div class="text-left">
                <div class="mb-3" style="color: white">
                    <h1 class=""
                        style="color:#3C6FA9; font-weight: bolder; text-transform: uppercase; font-size: 30px;">
                        {{ $carousel->title }}
                    </h1>
                    <p class="my-3">{{ $carousel->description }}</p>
                </div>
                @if ($carousel->link != null || $carousel->link2 != null)
                    <div class="flex gap-3 mt-8">
                        @if ($carousel->link != null)
                            <a style="background-color: #0B5ED7; font-weight: bold; font-size: 18px; font-weight: bold; padding: 8px; border-radius: 8px; text-transform: uppercase; color: white;"
                                href="{{ $carousel->link }}">{{ $carousel->link_text }}</a>
                        @endif
                        @if ($carousel->link2 != null)
                            <a style="background-color: #0B5ED7; font-weight: bold; font-size: 18px; font-weight: bold; padding: 8px; border-radius: 8px; text-transform: uppercase; color: white;"
                                href="{{ $carousel->link2 }}">{{ $carousel->link2_text }}</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
