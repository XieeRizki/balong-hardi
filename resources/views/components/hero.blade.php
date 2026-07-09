{{--
    Hero section. Nerima $hero (with 'stats' relation sudah di-load dari
    controller: Hero::with('stats')->first()).

    Kalau belum ada data hero di database, section ini otomatis gak nongol.
--}}
@props(['hero'])

@if ($hero)
    <section class="relative bg-secondary overflow-hidden">

        {{-- Aksen dekorasi lembut di background --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/3 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[100px] translate-y-1/3 -translate-x-1/4"></div>
        </div>

        <div class="container-max relative z-10 pt-28 pb-24 md:pt-36 md:pb-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                {{-- KIRI: Konten teks --}}
                <div class="lg:col-span-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full mb-6">
                        <span class="text-base">🎣</span>
                        <span class="text-primary text-sm font-bold tracking-wide">Tempat Memancing Terbaik</span>
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-[1.1] tracking-tight">
                        {{ $hero->title }}
                    </h1>

                    @if ($hero->subtitle)
                        <p class="text-lg text-gray-400 mb-10 leading-relaxed max-w-xl mx-auto lg:mx-0">
                            {{ $hero->subtitle }}
                        </p>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12 lg:mb-0">
                        @if ($hero->button_text && $hero->button_link)
                            <x-button href="{{ $hero->button_link }}" variant="primary" icon="whatsapp" class="!px-8 !py-4 shadow-[0_8px_24px_rgba(249,115,22,0.35)] hover:-translate-y-0.5 transition-transform duration-300">
                                {{ $hero->button_text }}
                            </x-button>
                        @endif
                        <x-button href="#fasilitas" variant="outline-white" icon="arrow-down" class="!px-8 !py-4 !border-white/20 hover:!bg-white/10 hover:-translate-y-0.5 transition-all duration-300">
                            Lihat Fasilitas
                        </x-button>
                    </div>

                    {{-- Stats versi mobile: baris horizontal simpel di bawah tombol --}}
                    @if ($hero->stats->isNotEmpty())
                        <div class="lg:hidden flex flex-wrap justify-center gap-x-8 gap-y-3 pt-8 border-t border-white/10">
                            @foreach ($hero->stats as $stat)
                                <div class="text-center">
                                    <p class="text-2xl font-extrabold text-primary">{{ $stat->value }}</p>
                                    <p class="text-gray-400 text-xs font-medium">{{ $stat->label }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- KANAN: Gambar utama + stat cards melayang --}}
                <div class="lg:col-span-6 relative hidden lg:block">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl ring-1 ring-white/10 aspect-[4/5]">
                        @if ($hero->image)
                            <img src="{{ asset('storage/' . $hero->image) }}"
                                 alt="{{ $hero->title }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-secondary-light to-secondary"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    </div>

                    {{-- Stat card melayang di pojok kiri bawah gambar --}}
                    @if ($hero->stats->isNotEmpty())
                        <div class="absolute -left-8 bottom-8 grid grid-cols-2 gap-3 w-[calc(100%-2rem)]">
                            @foreach ($hero->stats->take(4) as $stat)
                                <div class="bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-xl transform transition-all duration-300 hover:-translate-y-1">
                                    <div class="w-9 h-9 bg-primary/10 rounded-lg flex items-center justify-center mb-2">
                                        <i class="{{ $stat->icon ?: 'fas fa-chart-line' }} text-primary text-sm"></i>
                                    </div>
                                    <p class="text-xl font-extrabold text-secondary leading-none mb-1">{{ $stat->value }}</p>
                                    <p class="text-gray-500 text-xs font-semibold">{{ $stat->label }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- Wave divider biar transisi ke section berikutnya lebih halus --}}
        <div class="absolute bottom-0 left-0 right-0 leading-none">
            <svg viewBox="0 0 1440 80" class="w-full h-16 md:h-20" preserveAspectRatio="none">
                <path fill="#F9FAFB" d="M0,32 C240,80 480,0 720,16 C960,32 1200,80 1440,48 L1440,80 L0,80 Z"></path>
            </svg>
        </div>
    </section>
@endif