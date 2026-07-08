{{--
    Hero section. Nerima $hero (with 'stats' relation sudah di-load dari
    controller: Hero::with('stats')->where('is_active', true)->first()).

    Kalau belum ada data hero di database, section ini otomatis gak nongol
    (daripada error null property).
--}}
@props(['hero'])

@if ($hero)
    <section class="relative pt-24 pb-20 md:pt-36 md:pb-32 flex items-center min-h-[600px] lg:min-h-[700px] overflow-hidden bg-gray-900">

        {{-- BACKGROUND IMAGE DENGAN DARK GRADIENT OVERLAY --}}
        <div class="absolute inset-0 z-0">
            @if($hero->image)
                <img src="{{ asset('storage/' . $hero->image) }}" 
                     alt="{{ $hero->title }}" 
                     class="w-full h-full object-cover opacity-60">
            @endif
            {{-- Gradient hitam dari kiri ke kanan biar teks selalu 100% terbaca apapun gambarnya --}}
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/95 via-gray-900/70 to-transparent"></div>
        </div>

        {{-- AKSEN DEKORASI (GLOWING ORBS) --}}
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px]"></div>
        </div>

        <div class="container-max relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                {{-- KIRI: KONTEN TEKS --}}
                <div class="lg:col-span-7 text-center md:text-left">
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
                            @foreach ($hero->stats as $stat)
                                <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-6 transform transition-all duration-300 hover:-translate-y-2 hover:bg-white/20 hover:border-white/30 hover:shadow-2xl group">
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
    </section>
@endif