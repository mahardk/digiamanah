<section class="bg-white py-16">

    <div class="w-full px-6 lg:px-16 xl:px-24">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>

                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-certificate text-2xl md:text-3xl text-[#F2C94C]"></i>

                    <h2
                        class="text-[32px]
                               font-bold
                               text-[#355E3B]">

                        Produk Terbaru

                    </h2>

                </div>

                <p
                    class="mt-2
                           text-[14px]
                           text-[#666]">

                    Temukan beberapa produk terbaik dan berkualitas dari komunitas UMKM Amanah

                </p>

            </div>

            <a
                href="#"
                class="hidden lg:flex items-center gap-2 font-semibold text-[#355E3B] hover:text-[#27492C] transition group">

                Lihat Semua

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

        $produk = [

        [
        'Jus Strawberry Segar',
        'Risky Teler',
        'Minuman',
        'Rp. 13.000'
        ],

        [
        'Batik Print Premium',
        'Meda Batik',
        'Fashion',
        'Rp. 95.000'
        ],

        [
        'Keripik Seblak Daun Jeruk',
        'Erna Kue Kering',
        'Snack',
        'Rp. 15.000'
        ],

        [
        'Kue Sus Coklat',
        'Erna Kue Kering',
        'Snack',
        'Rp. 22.000'
        ],

        ];

        @endphp

        <!-- List Produk Terbaru -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

            @foreach($produk as $item)

            <div
                class="relative
                min-h-[210px]
                rounded-[16px]
                border
                border-[#B08A59]
                bg-white
                overflow-hidden
                flex
                hover:shadow-lg
                transition">

                {{-- Badge NEW --}}
                <span class="absolute
                            top-3
                            left-3
                            z-10
                            px-3
                            py-1
                            rounded-full
                            bg-yellow-500
                            text-white
                            text-[10px]
                            font-bold
                            uppercase
                            shadow-md">

                      NEW

                </span>

                {{-- Gambar --}}
                <div class="w-[38%] sm:w-[120px] flex-shrink-0">

                    <img
                        src="{{ asset('assets/umkm2.png') }}"
                        alt="{{ $item[0] }}"
                        class="w-full h-[210px] object-cover">

                </div>

                {{-- Content --}}
                <div class="flex-1 p-3 md:p-4 flex flex-col justify-between">

                    {{-- Atas --}}
                    <div>

                        {{-- Nama Produk --}}
                        <h3
                            class="text-base
                                font-bold
                                leading-6
                                line-clamp-2"
                            overflow-hidden>

                            {{ $item[0] }}

                        </h3>

                        {{-- Nama UMKM --}}
                        <p
                            class="mt-1
                           text-[13px]
                           text-[#666]">

                            {{ $item[1] }}

                        </p>

                        {{-- Badge --}}
                        <span
                            class="inline-flex
                           mt-3
                           px-4
                           h-[24px]
                           items-center
                           rounded-md
                           bg-[#E7D8B6]
                           text-[12px]
                           text-[#6E5A33]">

                            {{ $item[2] }}

                        </span>

                        {{-- Harga --}}
                        <h4
                            class="mt-3
                                text-xl
                                font-bold
                                text-[#355E3B]">

                            {{ $item[3] }}

                        </h4>

                    </div>

                    {{-- Button --}}
                    <button
                        class="w-full
                       h-9
                       rounded-md
                       border
                       border-[#355E3B]
                       text-[#355E3B]
                       text-sm
                       font-medium
                       flex
                       items-center
                       justify-center
                       gap-2
                       hover:bg-[#355E3B]
                       hover:text-white
                       transition">

                        Lihat Detail

                        <i class="fa-solid fa-arrow-right text-[11px]"></i>

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>
