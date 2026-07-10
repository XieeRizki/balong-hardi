{{--
    Hero section. Nerima $hero (with 'stats' relation sudah di-load dari
    controller: Hero::with('stats')->first()).

    Kalau belum ada data hero di database, section ini otomatis gak nongol.

    FULLSCREEN DINAMIS:
    - Pake CSS 100dvh (dynamic viewport height) sebagai base, biar akurat
      di HP (ngikutin address bar yg muncul/hilang) tanpa perlu JS di
      browser modern.
    - Ditambah fallback JS (--vh variable) buat browser lama yang belum
      support dvh, dan supaya tetep akurat pas devtools dibuka/ditutup
      atau window di-resize di desktop.
--}}
@props(['hero'])

@if ($hero)
    <section 
        id="hero-fullscreen"
        class="relative flex items-center min-h-screen -mt-20 overflow-hidden bg-gray-900 z-0"
        style="min-height: 100vh; min-height: 100dvh;"
    >

        {{-- BACKGROUND IMAGE DENGAN DARK GRADIENT OVERLAY --}}
        <div class="absolute inset-0 z-0">
            @if($hero->image)
                <img src="{{ asset('storage/' . $hero->image) }}" 
                     alt="{{ $hero->title }}" 
                     class="w-full h-full object-cover opacity-60">
            @endif
            {{-- Gradient hitam dari kiri ke kanan biar teks selalu 100% terbaca --}}
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/95 via-gray-900/70 to-transparent"></div>
        </div>

        {{-- AKSEN DEKORASI BLUR CAHAYA --}}
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px]"></div>
        </div>

        <div class="container-max relative z-10 w-full py-24 md:py-0">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                {{-- KIRI: KONTEN TEKS --}}
                <div class="lg:col-span-7 text-center md:text-left" data-aos="fade-right" data-aos-duration="1000">
                    {{-- Badge Premium --}}
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full mb-6 shadow-lg">
                        <span class="text-primary text-sm">🎣</span>
                        <span class="text-white text-sm font-semibold tracking-wide">Tempat Memancing Terbaik</span>
                    </div>

                    {{-- Judul --}}
                    <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight drop-shadow-lg">
                        {{ $hero->title }}
                    </h1>

                    {{-- Subtitle --}}
                    @if ($hero->subtitle)
                        <p class="text-lg md:text-xl text-gray-300 mb-10 leading-relaxed max-w-2xl mx-auto md:mx-0 font-light">
                            {{ $hero->subtitle }}
                        </p>
                    @endif

                    {{-- Tombol --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @if ($hero->button_text && $hero->button_link)
                            <x-button href="{{ $hero->button_link }}" variant="primary" icon="whatsapp" class="!px-8 !py-4 shadow-[0_0_20px_rgba(249,115,22,0.3)] hover:-translate-y-1 transition-transform duration-300">
                                {{ $hero->button_text }}
                            </x-button>
                        @endif
                        <x-button href="#fasilitas" variant="outline-white" icon="arrow-down" class="!px-8 !py-4 backdrop-blur-md bg-white/5 border-white/20 hover:bg-white/10 hover:-translate-y-1 transition-all duration-300">
                            Lihat Fasilitas
                        </x-button>
                    </div>
                </div>

                {{-- KANAN: KOTAK STATISTIK (GLASSMORPHISM) --}}
                @if ($hero->stats->isNotEmpty())
                    <div class="lg:col-span-5 hidden md:block">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($hero->stats as $index => $stat)
                                <div data-aos="fade-left" data-aos-delay="{{ $index * 150 }}" class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-6 transform transition-all duration-300 hover:-translate-y-2 hover:bg-white/20 hover:border-white/30 hover:shadow-2xl group">
                                    {{-- Icon Box --}}
                                    <div class="w-12 h-12 bg-primary/20 border border-primary/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                        @if($stat->icon)
                                            <i class="{{ $stat->icon }} text-primary text-xl"></i>
                                        @else
                                            <i class="fas fa-chart-line text-primary text-xl"></i>
                                        @endif
                                    </div>
                                    <h3 class="text-3xl lg:text-4xl font-bold text-white mb-1 tracking-tight">{{ $stat->value }}</h3>
                                    <p class="text-gray-400 text-sm font-medium">{{ $stat->label }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

        {{-- 
            WAVE SHAPE DIVIDER DI BAWAH HERO (Transisi ke halaman About)
            2 layer gelombang, masing2 punya data-speed beda -> pas discroll,
            layer belakang gerak lebih pelan, layer depan lebih cepat.
            Bikin efek kedalaman (parallax) kayak air beneran.
            Pattern SVG-nya sengaja dibikin looping mulus (pakai Q/T bezier
            yang start & endpoint-nya ketemu), jadi pas di-translate gak
            ada "patahan" di sambungannya.
        --}}
        <div class="absolute bottom-0 left-0 right-0 leading-none z-20 overflow-hidden pointer-events-none h-16 md:h-20">
            {{-- Layer belakang: lebih soft, gerak lebih lambat, arah normal --}}
            <svg viewBox="0 0 2880 80" preserveAspectRatio="none"
                 class="wave-layer wave-back absolute bottom-0 left-0 w-[200%] max-w-none h-full opacity-40">
                <path fill="#ffffff" d="M0,50 Q360,10 720,50 T1440,50 T2160,50 T2880,50 L2880,80 L0,80 Z"></path>
            </svg>
            {{-- Layer depan: gelombang utama, gerak lebih cepat, arah kebalikan
                 (biar keliatan kayak air bener2 bergerak, gak cuma geser satu arah) --}}
            <svg viewBox="0 0 2880 80" preserveAspectRatio="none"
                 class="wave-layer wave-front absolute bottom-0 left-0 w-[200%] max-w-none h-full">
                <path fill="#ffffff" d="M0,32 Q360,72 720,32 T1440,32 T2160,32 T2880,32 L2880,80 L0,80 Z"></path>
            </svg>
        </div>
    </section>

    {{-- 
        SCRIPT FALLBACK FULLSCREEN
        Ini yang bikin section ini bener2 ngikutin tinggi layar asli device,
        termasuk pas devtools dibuka/ditutup, resize window, rotate HP,
        atau browser mobile yang address bar-nya nongol/ilang.
        --vh dihitung dari 1% tinggi viewport ASLI (visualViewport kalo ada).
    --}}
    <script>
        (function () {
            const heroEl = document.getElementById('hero-fullscreen');
            if (!heroEl) return;

            function setFullHeight() {
                const viewportHeight = window.visualViewport
                    ? window.visualViewport.height
                    : window.innerHeight;

                const vh = viewportHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
                heroEl.style.minHeight = `calc(var(--vh, 1vh) * 100)`;
            }

            // Jalanin pertama kali
            setFullHeight();

            // Update kalo window di-resize (termasuk buka/tutup devtools di desktop)
            window.addEventListener('resize', setFullHeight);

            // Update kalo HP di-rotate
            window.addEventListener('orientationchange', setFullHeight);

            // Update kalo ada zoom / address bar HP muncul-ilang (lebih akurat dari resize biasa)
            if (window.visualViewport) {
                window.visualViewport.addEventListener('resize', setFullHeight);
            }
        })();
    </script>
@endif