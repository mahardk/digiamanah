<section class="bg-[#F8F1DE] py-8">

    <div class="w-full px-6 lg:px-16 xl:px-24">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">

            <div class="flex items-center gap-3">
                <i class="fa-solid fa-list text-[28px] text-[#355E3B]"></i>

                <h2 class="text-[32px] font-bold text-[#355E3B]">
                    Kategori Populer
                </h2>

            </div>

            <a
                href="#"
                class="hidden lg:flex items-center gap-2 font-semibold text-[#355E3B] hover:text-[#27492C] transition group">

                <span>Lihat Semua</span>

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 12h13" />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 5l7 7-7 7" />

                </svg>

            </a>

        </div>

        @php
        $kategori = [
        ['Minuman',32],
        ['Makanan',45],
        ['Snack',25],
        ['Kerajinan',10],
        ['Herbal',18],
        ['Fashion',37],
        ];
        @endphp

        <div class="flex items-center gap-4 overflow-x-auto pb-2">

            @foreach($kategori as $item)

            <div
                class="flex-shrink-0
                           w-[180px]
                           h-[64px]
                           rounded-[14px]
                           border
                           border-[#355E3B]
                           bg-white
                           px-4
                           flex
                           items-center
                           gap-3
                           transition
                           hover:shadow-md">

                <img
                    src="{{ asset('assets/kategori.png') }}"
                    alt="{{ $item[0] }}"
                    class="w-11 h-11 rounded-full object-cover border border-[#E6D8BC]">

                <div class="leading-tight">

                    <h4 class="text-[15px] font-semibold text-[#355E3B]">
                        {{ $item[0] }}
                    </h4>

                    <p class="text-[12px] text-[#A0A0A0] mt-1">
                        {{ $item[1] }} UMKM
                    </p>

                </div>

            </div>

            @endforeach

            {{-- Button Semua Kategori --}}
            <button
                class="flex-shrink-0
                       w-[64px]
                       h-[64px]
                       rounded-full
                       border
                       border-[#355E3B]
                       bg-white
                       flex
                       items-center
                       justify-center
                       transition
                       hover:bg-[#355E3B]
                       hover:text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="currentColor"
                    viewBox="0 0 24 24">

                    <path d="M3 3h8v8H3zm10 0h8v8h-8zM3 13h8v8H3zm10 0h8v8h-8z" />

                </svg>

            </button>

        </div>

    </div>

</section>
