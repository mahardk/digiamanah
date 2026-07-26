@extends('layouts.app')

@section('content')
<div class="pt-[110px] lg:pt-[122px] px-5 md:px-8 lg:px-12 xl:px-16 pb-16 bg-[#F5EEE0] min-h-screen">

    <div class="bg-white rounded-xl border border-[#B28C5D]/40 p-6">

        {{-- Header: Avatar + Nama + Badge --}}
        <div class="flex items-center gap-4 mb-6">
            <img src="{{ $umkm->foto ? asset('storage/'.$umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                class="w-16 h-16 aspect-square shrink-0 rounded-full object-cover border-2 border-[#B28C5D]">
            <div>
                <h1 class="text-xl font-bold text-[#1E2A38]">{{ $umkm->nama_umkm }}</h1>
                <div class="flex gap-2 mt-1">
                    @if ($umkm->kategori_usaha)
                        <span class="text-xs px-3 py-1 rounded-full bg-[#F5EEE0] text-[#8A6D3B]">{{ $umkm->kategori_usaha }}</span>
                    @endif
                    @if ($umkm->badge)
                        <span class="text-xs px-3 py-1 rounded-full bg-green-50 text-green-700">{{ ucfirst($umkm->badge) }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-8 gap-8">

            {{-- Kolom Kiri: Galeri + Deskripsi --}}
            <div class="lg:col-span-3">

                <img src="{{ $umkm->foto ? asset('storage/'.$umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                     class="w-full h-72 object-cover rounded-lg">

                @if ($umkm->foto_gallery && count($umkm->foto_gallery))
                    <div class="grid grid-cols-6 gap-2 mt-2">
                        @foreach ($umkm->foto_gallery as $foto)
                            <img src="{{ asset('storage/'.$foto) }}"
                                class="w-full aspect-square object-cover rounded border border-[#B28C5D]/30 cursor-pointer hover:opacity-80 transition">
                        @endforeach
                    </div>
                @endif

            </div>

            {{-- Kolom Tengah: Info UMKM --}}
            <div class="lg:col-span-3">

                @if ($umkm->is_verified)
                    <span class="inline-flex items-center gap-1 text-xs px-3 py-1 rounded-full bg-green-50 text-green-700 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        UMKM Terverifikasi
                    </span>
                @endif

                <h2 class="text-lg font-bold text-[#1E2A38] mb-1">{{ $umkm->nama_umkm }}</h2>
                <p class="text-sm font-medium text-gray-600 mb-3">Pemilik: {{ $umkm->nama_pemilik }}</p>

                <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ $umkm->deskripsi }}</p>

                <div class="space-y-2 text-sm text-gray-600 mb-4">
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $umkm->alamat }}
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        {{ $umkm->whatsapp }}
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#355E3B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Bergabung sejak {{ $umkm->created_at->translatedFormat('F Y') }}
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="https://wa.me/{{ $umkm->whatsapp }}?text=Halo, saya tertarik dengan produk {{ $umkm->nama_umkm }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-green-600/85 text-white text-sm font-medium px-5 py-2.5 rounded-md hover:bg-green-700 transition">
                        <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
                    </a>
                    <a href="#produk-terkait"
                       class="inline-flex items-center bg-[#F5EEE0] text-[#1E2A38] text-sm font-medium px-5 py-2.5 rounded-md hover:bg-[#e8dcc5] transition">
                        Lihat Produk
                    </a>
                </div>

            </div>

            {{-- Kolom Kanan: Bagikan Profile --}}
            <div class="lg:col-span-2">
                <div class="border rounded-lg border-[#b28c5d3f] p-4">
                    <h3 class="text-center font-semibold text-[#355E3B] mb-4">Bagikan Profile UMKM</h3>

                    <div class="flex justify-center mb-4">
                        <img src="{{ $umkm->foto ? asset('storage/'.$umkm->foto) : asset('assets/fallback-umkm.webp') }}"
                            class="w-16 h-16 aspect-square shrink-0 rounded-full object-cover border-2 border-[#B28C5D]">
                    </div>

                   <div
                        x-data="{ copied: false }"
                        @click="
                            navigator.clipboard.writeText('{{ url('/umkm/'.$umkm->slug) }}');
                            copied = true;
                            setTimeout(() => copied = false, 2000);
                        "
                        class="relative bg-[#F5EEE0] text-xs text-center rounded-md py-2.5 px-3 mb-3 break-all cursor-pointer hover:bg-[#efe3ce] transition flex items-center justify-center gap-2">

                        <span x-show="!copied">{{ url('/umkm/'.$umkm->slug) }}</span>
                        <span x-show="copied" class="text-green-700 font-medium" style="display: none;">Link tersalin!</span>

                        <svg x-show="!copied" xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>

                    </div>

                    <div class="space-y-2">
                        <a href="https://wa.me/?text={{ urlencode(url('/umkm/'.$umkm->slug)) }}"
                        target="_blank"
                        class="flex items-center gap-2 justify-center border rounded-md py-2 text-sm text-green-700 hover:bg-green-50 transition">
                            <i class="fa-brands fa-whatsapp"></i> Bagikan ke WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/umkm/'.$umkm->slug)) }}"
                        target="_blank"
                        class="flex items-center gap-2 justify-center border rounded-md py-2 text-sm text-blue-700 hover:bg-blue-50 transition">
                            <i class="fa-brands fa-facebook"></i> Bagikan ke Facebook
                        </a>
                        <button
                            x-data="{ copied: false }"
                            @click="
                                navigator.clipboard.writeText('{{ url('/umkm/'.$umkm->slug) }}');
                                copied = true;
                                setTimeout(() => copied = false, 2000);
                            "
                            class="w-full flex items-center gap-2 justify-center border rounded-md py-2 text-sm text-pink-600 hover:bg-pink-50 transition">
                            <i class="fa-brands fa-instagram"></i>
                            <span x-show="!copied">Bagikan ke Instagram</span>
                            <span x-show="copied" style="display: none;">Link tersalin!</span>
                        </button>
                    </div>

                @if ($umkm->is_verified)
                    <p class="flex items-center justify-center gap-1.5 text-xs text-center text-green-700 mt-4">
                        Profile UMKM ini sudah terverifikasi dan dapat dipercaya
                    </p>
                @endif
                </div>
            </div>

        </div>

        {{-- Produk dari UMKM ini --}}
        <div id="produk-terkait" class="bg-white rounded-lg border border-[#B28C5D]/10 p-6 mt-6">

            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-[#1E2A38]">Produk dari {{ $umkm->nama_umkm }}</h3>
                <a href="{{ route('produk.index', ['umkm' => $umkm->slug]) }}" class="text-sm text-[#355E3B] hover:underline">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                @forelse ($produkLain as $produk)
                    <a href="{{ route('produk.show', $produk->slug) }}"
                    class="block border border-[#B28C5D]/40 rounded-lg overflow-hidden hover:shadow-md transition">
                        <img src="{{ $produk->foto ? asset('storage/'.$produk->foto) : asset('assets/fallback-umkm.webp') }}"
                            class="w-full h-28 object-cover">
                        <div class="p-3">
                            <h4 class="text-sm font-semibold line-clamp-1">{{ $produk->nama_produk }}</h4>
                            <p class="text-xs text-gray-500 mb-1">{{ $umkm->nama_umkm }}</p>
                            @if ($produk->kategori)
                                <span class="inline-block text-[10px] px-2 py-0.5 rounded-full bg-[#F5EEE0] text-[#8A6D3B] mb-2">
                                    {{ $produk->kategori->nama }}
                                </span>
                            @endif
                            <p class="text-sm text-[#355E3B] font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <span class="block text-center border border-[#355E3B] text-[#355E3B] text-xs font-medium rounded-md py-1.5 mt-2 hover:bg-[#355E3B] hover:text-white transition">
                                Lihat Produk
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-500 text-sm">Belum ada produk dari UMKM ini.</p>
                @endforelse
            </div>

        </div>
    
    </div>

    {{-- Galeri Produk (Lightbox) --}}
    @php
        $semuaFoto = collect([$umkm->foto])
            ->merge($umkm->foto_gallery ?? [])
            ->filter()
            ->values();
    @endphp

    @if ($semuaFoto->count())
    <div
        x-data="{
            images: {{ Illuminate\Support\Js::from($semuaFoto) }},
            current: 0,
            zoom: 1,
            next() { this.current = (this.current + 1) % this.images.length; this.zoom = 1 },
            prev() { this.current = (this.current - 1 + this.images.length) % this.images.length; this.zoom = 1 },
            zoomIn() { this.zoom = Math.min(this.zoom + 0.25, 2.5) },
            zoomOut() { this.zoom = Math.max(this.zoom - 0.25, 1) },
            toggleFullscreen() {
                const el = this.$refs.mainImage;
                if (!document.fullscreenElement) el.requestFullscreen();
                else document.exitFullscreen();
            },
            share() {
                const url = '{{ url('/umkm/'.$umkm->slug) }}';
                if (navigator.share) {
                    navigator.share({ title: '{{ $umkm->nama_umkm }}', url });
                } else {
                    navigator.clipboard.writeText(url);
                }
            }
        }"
        class="bg-white rounded-xl border border-[#B28C5D]/40 p-6 mt-6">

        <h2 class="text-2xl font-bold text-[#355E3B] text-center mb-6">Galeri Produk</h2>

        <div class="relative max-w-lg mx-auto">
            <img
                x-ref="mainImage"
                :src="'{{ asset('storage') }}/' + images[current]"
                :style="'transform: scale(' + zoom + ')'"
                class="w-full h-80 object-cover rounded-lg transition-transform duration-300 bg-black">

            <button
                @click="next()"
                x-show="images.length > 1"
                class="absolute top-1/2 -right-5 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full border-2 border-[#B28C5D] bg-white text-[#B28C5D] hover:bg-[#B28C5D] hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <button
                @click="prev()"
                x-show="images.length > 1"
                class="absolute top-1/2 -left-5 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full border-2 border-[#B28C5D] bg-white text-[#B28C5D] hover:bg-[#B28C5D] hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        {{-- Toolbar --}}
        <div class="flex items-center justify-center gap-2 mt-4">
            <div class="flex items-center gap-1 bg-white border rounded-full shadow px-2 py-1.5">

                <span class="text-xs text-gray-500 px-2" x-text="(current + 1) + '/' + images.length"></span>

                <div class="w-px h-4 bg-gray-200"></div>

                <button @click="zoomIn()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100" title="Perbesar">
                    <i class="fa-solid fa-magnifying-glass-plus text-sm text-gray-600"></i>
                </button>

                <button @click="zoomOut()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100" title="Perkecil">
                    <i class="fa-solid fa-magnifying-glass-minus text-sm text-gray-600"></i>
                </button>

                <button @click="toggleFullscreen()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100" title="Layar Penuh">
                    <i class="fa-solid fa-expand text-sm text-gray-600"></i>
                </button>

                <button @click="share()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100" title="Bagikan">
                    <i class="fa-solid fa-share-nodes text-sm text-gray-600"></i>
                </button>

            </div>
        </div>

        {{-- Thumbnail strip --}}
        <div class="flex items-center justify-center gap-2 mt-4 flex-wrap">
            <template x-for="(img, index) in images" :key="index">
                <img
                    :src="'{{ asset('storage') }}/' + img"
                    @click="current = index; zoom = 1"
                    :class="current === index ? 'ring-2 ring-[#355E3B]' : 'opacity-60 hover:opacity-100'"
                    class="w-14 h-14 object-cover rounded cursor-pointer transition">
            </template>
        </div>

        {{-- Kontak --}}
        <div class="flex justify-center mt-10">
            <div class="bg-white rounded-xl border border-[#B28C5D]/40 shadow-sm p-6 w-3xl max-w-full">

                <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">

                    <div>
                        <h2 class="text-2xl font-bold text-[#1E2A38] mb-4">Kontak</h2>

                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-semibold text-[#1E2A38]">Alamat</p>
                                <p class="text-sm text-gray-600">{{ $umkm->alamat }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-[#1E2A38]">Telepon</p>
                                <p class="text-sm text-gray-600">{{ $umkm->whatsapp }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-[330px] h-[200px] shrink-0 rounded-lg overflow-hidden border">
                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode($umkm->alamat.' Surabaya') }}&output=embed"
                            class="w-full h-full"
                            style="border:0;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>

            </div>
        </div>

        {{-- CTA Banner --}}
        <div class="flex items-center justify-between gap-4 bg-green-50 border border-green-600/90 rounded-xl p-3 mt-8 flex-wrap">

            <div class="flex items-center gap-4">
                <img src="{{ asset('assets/hero-cta.webp') }}" class="w-20 h-14">
                <div>
                    <h3 class="font-bold text-[#1E2A38]">Temukan Produk Terbaik dari UMKM Lainnya</h3>
                    <p class="text-sm text-gray-600">Dukung produk lokal dan berdayakan ekonomi masyarakat</p>
                </div>
            </div>

            <a href="{{ route('umkm.index') }}"
            class="inline-flex items-center gap-2 bg-[#355E3B] text-white text-sm font-medium px-5 py-3 rounded-md hover:bg-[#2a4a2f] transition whitespace-nowrap">
                Jelajahi UMKM Lainnya
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>

        </div>
    </div>
    @endif

</div>
@endsection