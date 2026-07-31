@extends('layouts.app')

@section('content')
<div class="pt-[110px] lg:pt-[122px] px-5 md:px-8 lg:px-12 xl:px-16 pb-16 bg-[#F5EEE0] min-h-screen">

    <div class="bg-white rounded-xl border border-[#B28C5D] p-6">

        {{-- Header: Avatar UMKM + Nama Produk + Kategori --}}
        <div class="flex items-center gap-4 mb-6">
            <img src="{{ $produk->umkm->foto ? asset('storage/'.$produk->umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                class="w-14 h-14 aspect-square shrink-0 rounded-full object-cover border-2 border-[#B28C5D]">
            <div>
                <h1 class="text-xl font-bold text-[#1E2A38]">{{ $produk->nama_produk }}</h1>
                @if ($produk->kategori)
                    <span class="inline-block text-xs px-3 py-1 rounded-full bg-[#F5EEE0] text-[#8A6D3B] mt-1">
                        {{ $produk->kategori->nama }}
                    </span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-8 gap-8">

            {{-- Kolom Kiri: Foto Produk --}}
            <div class="lg:col-span-3">
                <img src="{{ $produk->foto ? asset('storage/'.$produk->foto) : asset('assets/fallback-produk.webp') }}"
                     class="w-full h-72 object-cover rounded-lg">
            </div>

            {{-- Kolom Tengah: Info Produk --}}
            <div class="lg:col-span-3">

                <h2 class="text-lg font-bold text-[#1E2A38] mb-1">{{ $produk->nama_produk }}</h2>
                <p class="text-lg font-bold text-[#355E3B] mb-3">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ $produk->deskripsi }}</p>

                <div class="space-y-2 text-sm text-gray-600 mb-4">
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $produk->umkm->nama_umkm }}
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $produk->umkm->alamat }}
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        {{ $produk->umkm->whatsapp }}
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="https://wa.me/{{ $produk->umkm->whatsapp }}?text=Halo, saya tertarik dengan produk {{ $produk->nama_produk }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-green-600/85 text-white text-sm font-medium px-5 py-2.5 rounded-md hover:bg-green-700 transition">
                        <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
                    </a>
                    <a href="{{ route('umkm.show', $produk->umkm->slug) }}"
                       class="inline-flex items-center bg-[#F5EEE0] text-[#1E2A38] text-sm font-medium px-5 py-2.5 rounded-md hover:bg-[#e8dcc5] transition">
                        Lihat UMKM
                    </a>
                </div>

            </div>

            {{-- Kolom Kanan: QR Code Produk --}}
            <div class="lg:col-span-2">
                <div class="border rounded-lg border-[#b28c5d3f] p-4">
                    <h3 class="text-center font-semibold text-[#355E3B] mb-4">QR Code Produk</h3>
                    <p class="text-center text-xs text-gray-500 -mt-3 mb-4">{{ $produk->nama_produk }}</p>

                    <div class="flex justify-center mb-4">
                        @if ($produk->qr_code)
                            <img src="{{ asset('storage/'.$produk->qr_code) }}" class="w-40 h-40 object-contain">
                        @else
                            <div class="w-40 h-40 flex items-center justify-center bg-gray-100 rounded text-xs text-gray-400 text-center px-3">
                                QR Code belum tersedia
                            </div>
                        @endif
                    </div>

                    @if ($produk->qr_code)
                        <a href="{{ asset('storage/'.$produk->qr_code) }}" download
                           class="block text-center bg-[#355E3B] text-white text-sm font-medium rounded-md py-2 mb-3 hover:bg-[#2a4a2f] transition">
                            Download QR
                        </a>
                    @endif

                    <p class="text-xs text-center text-gray-500">
                        Scan untuk melihat detail produk ini atau bagikan ke orang lain
                    </p>
                </div>
            </div>

        </div>

        {{-- Produk lain dari UMKM ini --}}
        <div class="bg-white rounded-lg border border-[#B28C5D]/10 p-6 mt-6">

            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-[#1E2A38]">Produk dari {{ $produk->umkm->nama_umkm }}</h3>
                <a href="{{ route('produk.index', ['umkm' => $produk->umkm->slug]) }}" class="text-sm text-[#355E3B] hover:underline">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                @forelse ($produkLain as $lain)
                    <a href="{{ route('produk.show', $lain->slug) }}"
                    class="block border border-[#B28C5D]/40 rounded-lg overflow-hidden hover:shadow-md transition">
                        <img src="{{ $lain->foto ? asset('storage/'.$lain->foto) : asset('assets/fallback-produk.webp') }}"
                            class="w-full h-28 object-cover">
                        <div class="p-3">
                            <h4 class="text-sm font-semibold line-clamp-1">{{ $lain->nama_produk }}</h4>
                            <p class="text-xs text-gray-500 mb-1">{{ $produk->umkm->nama_umkm }}</p>
                            @if ($lain->kategori)
                                <span class="inline-block text-[10px] px-2 py-0.5 rounded-full bg-[#F5EEE0] text-[#8A6D3B] mb-2">
                                    {{ $lain->kategori->nama }}
                                </span>
                            @endif
                            <p class="text-sm text-[#355E3B] font-bold">Rp {{ number_format($lain->harga, 0, ',', '.') }}</p>
                            <span class="block text-center border border-[#355E3B] text-[#355E3B] text-xs font-medium rounded-md py-1.5 mt-2 hover:bg-[#355E3B] hover:text-white transition">
                                Lihat Produk
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-500 text-sm">Belum ada produk lain dari UMKM ini.</p>
                @endforelse
            </div>

        </div>

    </div>

</div>
@endsection