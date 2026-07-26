<nav
    x-data="{
        open: false,
        scrolled: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 30;
        });
    "
    :class="scrolled
        ? 'bg-white/70 backdrop-blur-xl shadow-md border-transparent'
        : 'bg-white border-gray-100'"
    class="fixed top-0 left-0 z-50 w-full border-b transition-all duration-300">

    <div class="w-full px-5 md:px-8 lg:px-12 xl:px-16 h-[90px] lg:h-[102px] flex items-center">

        <!-- Logo -->
        <a href="/" class="shrink-0">
            <img
                src="{{ asset('assets/logo-1.png') }}"
                alt="Logo DigiAmanah"
                class="w-[170px] md:w-[200px] lg:w-[220px] object-contain">
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex flex-1 justify-center">

            <ul class="flex items-center gap-10 xl:gap-12 text-[17px] xl:text-[18px] font-medium">

                <li>
                    <a href="{{ url('/') }}"
                    class="relative {{ request()->is('/') ? 'text-[#355E3B]' : 'hover:text-[#355E3B] transition' }}">
                        Beranda
                        @if (request()->is('/'))
                            <span class="absolute left-0 -bottom-2 w-full h-[3px] rounded-full bg-[#B08A59]"></span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-[#355E3B] transition">Tentang</a>
                </li>

                <li>
                    <a href="{{ route('umkm.index') }}"
                    class="relative {{ request()->routeIs('umkm.*') ? 'text-[#355E3B]' : 'hover:text-[#355E3B] transition' }}">
                        UMKM
                        @if (request()->routeIs('umkm.*'))
                            <span class="absolute left-0 -bottom-2 w-full h-[3px] rounded-full bg-[#B08A59]"></span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ route('produk.index') }}"
                    class="relative {{ request()->routeIs('produk.*') ? 'text-[#355E3B]' : 'hover:text-[#355E3B] transition' }}">
                        Produk
                        @if (request()->routeIs('produk.*'))
                            <span class="absolute left-0 -bottom-2 w-full h-[3px] rounded-full bg-[#B08A59]"></span>
                        @endif
                    </a>
                </li>

                <li><a href="#" class="hover:text-[#355E3B] transition">Kontak</a></li>

            </ul>

        </div>

        <!-- Desktop Right -->
        <div class="hidden lg:flex items-center gap-5">

            <div class="relative">

                <input
                    type="text"
                    placeholder="Cari Produk, UMKM, atau Kategori..."
                    class="w-[280px] xl:w-[320px] h-[42px] rounded-md bg-[#ECECEC] pl-4 pr-10 text-sm placeholder:text-gray-500 focus:outline-none">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />

                </svg>

            </div>

            <a href="#">
                <i class="fa-brands fa-whatsapp text-[30px] text-[#25D366] hover:scale-110 transition"></i>
            </a>

        </div>

        <!-- Mobile Right -->
        <div class="ml-auto flex items-center gap-4 lg:hidden">

            <a href="#">
                <i class="fa-brands fa-whatsapp text-[28px] text-[#25D366]"></i>
            </a>

            <button @click="open = !open">

                <svg x-show="!open"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                </svg>

                <svg x-show="open"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="lg:hidden border-t bg-white/90 backdrop-blur-xl"

        <div class="px-5 py-5">

            <!-- Search -->
            <div class="relative mb-5">

                <input
                    type="text"
                    placeholder="Cari Produk..."
                    class="w-full h-11 rounded-md bg-[#ECECEC] pl-4 pr-10 text-sm focus:outline-none">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.35-5.15a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />

                </svg>

            </div>

            <ul class="space-y-1 text-[16px] font-medium">

                <li>
                    <a href="{{ url('/') }}"
                    class="block rounded-lg px-4 py-3 {{ request()->is('/') ? 'bg-[#355E3B] text-white' : 'hover:bg-gray-100' }}">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="#" class="block rounded-lg px-4 py-3 hover:bg-gray-100">
                        Tentang
                    </a>
                </li>

                <li>
                    <a href="{{ route('umkm.index') }}"
                    class="block rounded-lg px-4 py-3 {{ request()->routeIs('umkm.*') ? 'bg-[#355E3B] text-white' : 'hover:bg-gray-100' }}">
                        UMKM
                    </a>
                </li>

                <li>
                    <a href="{{ route('produk.index') }}"
                    class="block rounded-lg px-4 py-3 {{ request()->routeIs('produk.*') ? 'bg-[#355E3B] text-white' : 'hover:bg-gray-100' }}">
                        Produk
                    </a>
                </li>

                <li>
                    <a href="#" class="block rounded-lg px-4 py-3 hover:bg-gray-100">
                        Kontak
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>
