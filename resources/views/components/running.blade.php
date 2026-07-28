<section class="relative h-[90px] overflow-hidden">

    {{-- Background Coklat --}}
    <div
        class="absolute inset-0 bg-[#B08A59]"
        style="clip-path: polygon(0 35%,100% 0,100% 100%,0 100%);">
    </div>

    {{-- Strip Hijau --}}
    <div
        class="absolute top-1/2 left-0
               w-full h-[46px]
               -translate-y-1/2
               bg-[#355E3B]
               overflow-hidden">

        <div class="flex h-full items-center whitespace-nowrap running-text">

            @for ($j = 0; $j < 2; $j++)

                <div class="flex items-center gap-12 px-6">

                    @for ($i = 0; $i < 14; $i++)

                        <div class="flex items-center gap-3">

                            <img
                                src="{{ asset('assets/logo_star.png') }}"
                                alt="Star"
                                class="w-4 h-4 object-contain">

                            <span
                                class="text-white
                                       text-[20px]
                                       font-semibold
                                       tracking-wide">

                                DigiAmanah

                            </span>

                        </div>

                    @endfor

                </div>

            @endfor

        </div>

    </div>

</section>

<style>
.running-text{
    width:max-content;
    animation: marquee 20s linear infinite;
}

@keyframes marquee{
    from{
        transform:translateX(0);
    }

    to{
        transform:translateX(-50%);
    }
}
</style>
