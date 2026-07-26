@extends('layouts.app')

@section('content')
<div class="pt-[110px] lg:pt-[122px] px-5 md:px-8 lg:px-12 xl:px-16 pb-16 bg-[#F5EEE0] min-h-screen">

    <h1 class="text-3xl font-bold text-[#355E3B] mb-6">UMKM DigiAmanah</h1>

    <form method="GET" class="flex flex-col md:flex-row gap-3 mb-8">

        <div class="relative w-full md:max-w-md">
            <input
                type="text"
                name="cari"
                value="{{ request('cari') }}"
                placeholder="Cari Umkm"
                class="w-full h-11 rounded-md border border-[#B28C5D] pl-4 pr-10 bg-white focus:outline-none focus:ring-2 focus:ring-[#355E3B]/30">
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                </svg>
            </button>
        </div>

        <!-- Dropdown Kategori Custom (ganti <select> di bawah) -->
        <div x-data="{ open: false, selected: '{{ request('kategori') ?: 'Semua' }}' }" class="relative w-full md:w-48">

            <button
                type="button"
                @click="open = !open"
                @click.outside="open = false"
                class="w-full h-11 rounded-md border border-[#B28C5D] bg-white px-4 flex items-center justify-between text-sm hover:border-[#355E3B] transition">
                <span x-text="selected"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 transition" :class="open && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div
                x-show="open"
                x-transition
                class="absolute z-20 mt-1 w-full bg-white border rounded-md shadow-lg overflow-hidden"
                style="display: none;">

                <button type="submit" name="kategori" value=""
                    @click="selected = 'Semua'"
                    class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                    Semua
                </button>

                @foreach ($kategoriList as $kategori)
                    <button type="submit" name="kategori" value="{{ $kategori }}"
                        @click="selected = '{{ $kategori }}'"
                        class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50">
                        {{ $kategori }}
                    </button>
                @endforeach

            </div>
        </div>

    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">
        @forelse ($umkms as $umkm)
            <a href="{{ route('umkm.show', $umkm->slug) }}"
               class="relative block bg-white rounded-xl border border-[#B28C5D] overflow-hidden hover:shadow-lg transition">

                @if ($umkm->badge)
                    <span class="absolute top-3 left-3 z-10 text-xs font-medium px-3 py-1 rounded-full bg-white/90 border
                        {{ $umkm->badge === 'favorit' ? 'text-[#B08A59] border-[#B08A59]' : 'text-[#355E3B] border-[#355E3B]' }}">
                        {{ ucfirst($umkm->badge) }}
                    </span>
                @endif

                <div class="relative">
                    <img src="{{ $umkm->foto ? asset('storage/' . $umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                        class="w-full h-40 object-cover">

                    <div class="absolute -bottom-5 right-3 w-12 h-12 rounded-full border-2 border-white bg-white overflow-hidden shadow">
                        <img src="{{ $umkm->foto ? asset('storage/' . $umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="p-4 pt-6">
                    <h3 class="font-semibold text-[15px]">{{ $umkm->nama_umkm }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $umkm->kategori_usaha }}</p>

                    <p class="text-xs text-gray-500 flex items-center gap-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ \Illuminate\Support\Str::limit($umkm->alamat, 30) }}
                    </p>

                    <span class="inline-block w-full text-center border border-[#355E3B] text-[#355E3B] text-sm font-medium rounded-md py-2 hover:bg-[#355E3B] hover:text-white transition">
                        Lihat UMKM
                    </span>
                </div>

            </a>
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada data UMKM.</p>
        @endforelse
    </div>

    <div class="mt-8">
       <x-pagination :paginator="$umkms->appends(request()->query())" />
    </div>

</div>
@endsection