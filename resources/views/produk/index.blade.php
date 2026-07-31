@extends('layouts.app')

@section('content')
<div class="pt-[110px] lg:pt-[122px] px-5 md:px-8 lg:px-12 xl:px-16 pb-16 bg-[#F5EEE0] min-h-screen">

    <h1 class="text-3xl font-bold text-[#355E3B] mb-6">Daftar Produk</h1>

    <form method="GET" class="flex flex-col md:flex-row gap-3 mb-8">

        <div class="relative w-full md:max-w-md">
            <input
                type="text"
                name="cari"
                value="{{ request('cari') }}"
                placeholder="Cari Produk Umkm"
                class="w-full h-11 rounded-md border border-[#B28C5D] pl-4 pr-10 bg-white focus:outline-none focus:ring-2 focus:ring-[#355E3B]/30">
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                </svg>
            </button>
        </div>

        <!-- Dropdown UMKM (Semua) -->
        <div x-data="{ open: false, selected: '{{ $umkmList->firstWhere('id', (int) request('umkm'))->nama_umkm ?? 'Semua' }}' }" class="relative w-full md:w-48">

            <button
                type="button"
                @click="open = !open"
                @click.outside="open = false"
                class="w-full h-11 rounded-md border border-[#B28C5D] bg-white px-4 flex items-center justify-between text-sm hover:border-[#355E3B] transition">
                <span x-text="selected" class="truncate"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 transition shrink-0" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div
                x-show="open"
                x-transition
                class="absolute z-20 mt-1 w-full max-h-64 overflow-y-auto bg-white border rounded-md shadow-lg"
                style="display: none;">

                <button type="submit" name="umkm" value=""
                    @click="selected = 'Semua'"
                    class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                    Semua
                </button>

                @foreach ($umkmList as $umkm)
                    <button type="submit" name="umkm" value="{{ $umkm->id }}"
                        @click="selected = '{{ $umkm->nama_umkm }}'"
                        class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                        {{ $umkm->nama_umkm }}
                    </button>
                @endforeach

            </div>
        </div>

        <!-- Dropdown Kategori -->
        <div x-data="{ open: false, selected: '{{ $kategoriList->firstWhere('id', (int) request('kategori'))->nama ?? 'Kategori' }}' }" class="relative w-full md:w-48">

            <button
                type="button"
                @click="open = !open"
                @click.outside="open = false"
                class="w-full h-11 rounded-md border border-[#B28C5D] bg-white px-4 flex items-center justify-between text-sm hover:border-[#355E3B] transition">
                <span x-text="selected" class="truncate"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 transition shrink-0" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div
                x-show="open"
                x-transition
                class="absolute z-20 mt-1 w-full max-h-64 overflow-y-auto bg-white border rounded-md shadow-lg"
                style="display: none;">

                <button type="submit" name="kategori" value=""
                    @click="selected = 'Kategori'"
                    class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                    Semua Kategori
                </button>

                @foreach ($kategoriList as $kategori)
                    <button type="submit" name="kategori" value="{{ $kategori->id }}"
                        @click="selected = '{{ $kategori->nama }}'"
                        class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                        {{ $kategori->nama }}
                    </button>
                @endforeach

            </div>
        </div>

    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($produks as $produk)
            <a href="{{ route('produk.show', $produk->slug) }}"
               class="relative block bg-white rounded-xl border border-[#B28C5D] overflow-hidden hover:shadow-lg transition">

                <div class="relative">
                    <img src="{{ $produk->foto ? asset('storage/' . $produk->foto) : asset('assets/fallback-produk.webp') }}"
                        class="w-full h-40 object-cover">

                    @if ($produk->qr_code)
                        <div class="absolute bottom-2 right-2 w-9 h-9 rounded-md bg-white p-1 shadow border border-gray-200">
                            <img src="{{ asset('storage/' . $produk->qr_code) }}" class="w-full h-full object-contain">
                        </div>
                    @endif
                </div>

                <div class="p-4">
                    <h3 class="font-semibold text-[15px] truncate">{{ $produk->nama_produk }}</h3>
                    <p class="text-sm text-gray-500 mb-1 truncate">{{ $produk->umkm->nama_umkm }}</p>

                    @if ($produk->kategori)
                        <span class="inline-block text-xs px-2 py-0.5 rounded-full bg-[#F5EEE0] text-[#355E3B] mb-2">
                            {{ $produk->kategori->nama }}
                        </span>
                    @endif

                    <p class="font-semibold text-[#355E3B] mb-3">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    <span class="inline-block w-full text-center border border-[#355E3B] text-[#355E3B] text-sm font-medium rounded-md py-2 hover:bg-[#355E3B] hover:text-white transition">
                        Lihat Detail
                    </span>
                </div>

            </a>
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada data produk.</p>
        @endforelse
    </div>

    <div class="mt-8">
       <x-pagination :paginator="$produks->appends(request()->query())" />
    </div>

</div>
@endsection