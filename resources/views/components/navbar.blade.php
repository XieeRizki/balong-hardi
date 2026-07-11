{{--
    Navbar. whatsapp number sekarang diambil dari $contact (Model Contact),
    bukan hardcode "6281234567890" lagi -- jadi kalau admin ganti nomor WA
    di dashboard, navbar otomatis ikut update.

    $contact di-share ke semua view lewat View Composer / App Service Provider,
    jadi gak perlu di-pass manual tiap render komponen ini.

    UPDATE: navbar abu (bg-gray-100), tombol CTA ijo gelap.
--}}
@php
    $contact = $contact ?? \App\Models\Contact::first();
    $waNumber = $contact->whatsapp ?? '6281234567890';
@endphp

<nav class="bg-gray-100 border-b border-gray-200 sticky top-0 z-30">
    <div class="container-max">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-0 md:space-x-1 group">
                
                {{-- LOGO LANGSUNG (Tanpa kotak) --}}
                {{-- Ukurannya dibesarin jadi w-20 h-20 biar tulisan di logonya kebaca --}}
                <img src="{{ asset('images/logo.jpeg') }}" 
                     alt="Logo Balong Hardi" 
                     class="w-16 h-16 md:w-20 md:h-20 object-contain drop-shadow-sm transform group-hover:scale-105 transition-all duration-300">

                {{-- TEKS DI SAMPING LOGO --}}
                <div class="flex flex-col justify-center">
                    <h1 class="text-xl md:text-2xl font-extrabold text-secondary leading-tight tracking-tight">BALONG HARDI</h1>
                    <p class="text-[10px] md:text-xs text-gray-500 font-inter font-medium tracking-wide">Pemancingan Sumedang</p>
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
                    <a href="{{ $url }}" class="px-4 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-300 rounded-lg hover:bg-gray-200">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <!-- CTA Button Desktop -->
            <div class="hidden md:flex items-center">
                <a href="https://wa.me/{{ $waNumber }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 !py-2.5 px-5 rounded-xl font-semibold text-white bg-green-800 hover:bg-green-900 shadow-lg transition-colors duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12.004 2c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.464 3.484 1.345 4.997L2 22l5.13-1.345a9.96 9.96 0 0 0 4.874 1.24h.005c5.514 0 9.997-4.483 9.997-9.997 0-2.67-1.04-5.18-2.93-7.07A9.938 9.938 0 0 0 12.004 2zm0 18.164h-.004a8.16 8.16 0 0 1-4.156-1.14l-.298-.177-3.043.798.812-2.968-.194-.305a8.166 8.166 0 0 1-1.253-4.375c0-4.514 3.674-8.188 8.192-8.188 2.187 0 4.243.853 5.79 2.402a8.13 8.13 0 0 1 2.397 5.792c0 4.514-3.674 8.161-8.243 8.161z"/>
                    </svg>
                    Hubungi
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-200 transition-colors duration-300">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>