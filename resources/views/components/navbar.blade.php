{{--
    Navbar. whatsapp number sekarang diambil dari $contact (Model Contact),
    bukan hardcode "6281234567890" lagi -- jadi kalau admin ganti nomor WA
    di dashboard, navbar otomatis ikut update.

    $contact di-share ke semua view lewat View Composer / App Service Provider,
    jadi gak perlu di-pass manual tiap render komponen ini.
--}}
@php
    $contact = $contact ?? \App\Models\Contact::first();
    $waNumber = $contact->whatsapp ?? '6281234567890';
@endphp

<nav class="bg-white border-b border-gray-100 sticky top-0 z-30">
    <div class="container-max">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-secondary">BALONG HARDI</h1>
                    <p class="text-xs text-gray-500 font-inter font-medium">Pemancingan Sumedang</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                @php
                    $navLinks = [
                        'Home' => route('home'),
                        'Tentang' => route('home') . '#tentang',
                        'Fasilitas' => route('home') . '#fasilitas',
                        'Harga' => route('home') . '#harga',
                        'Testimoni' => route('home') . '#testimoni',
                        'Blog' => route('home') . '#blog',
                        'Kontak' => route('home') . '#kontak',
                    ];
                @endphp
                @foreach ($navLinks as $label => $url)
                    <a href="{{ $url }}" class="px-4 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-300 rounded-lg hover:bg-gray-50">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <!-- CTA Button Desktop -->
            <div class="hidden md:flex items-center">
                <x-button href="https://wa.me/{{ $waNumber }}" variant="primary" icon="whatsapp" class="!py-2.5">
                    Hubungi
                </x-button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>