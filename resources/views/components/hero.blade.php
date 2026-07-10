{{--
    Hero section. Nerima $hero (with 'stats' relation sudah di-load dari
    controller: Hero::with('stats')->first()).

    Kalau belum ada data hero di database, section ini otomatis gak nongol
    (daripada error null property).
--}}
@props(['hero'])

@if ($hero)
    <section class="pt-20 pb-16 md:pt-32 md:pb-24 bg-gradient-to-br from-secondary via-secondary-light to-dark text-white overflow-hidden relative">

    {{-- BLOK GAMBAR BACKGROUND --}}
    {{-- class "parallax-img" + "overflow-hidden" di parent + "scale-110" di img:
         ini yang bikin efek parallax dari script di app.blade.php kepakai
         (gambar butuh sedikit "ruang lebih" biar pas digeser translateY
         gak kelihatan tepi putihnya). --}}
        @if($hero->image)
            <div class="absolute inset-0 z-0 overflow-hidden">
                <img src="{{ asset('storage/' . $hero->image) }}"
                     alt="{{ $hero->title }}"
                     class="parallax-img w-full h-full object-cover opacity-40 mix-blend-overlay scale-110">
            </div>
        @endif


        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-10 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl"></div>
        </div>

        <div class="container-max relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="text-center md:text-left">
                    <div class="inline-block mb-6 px-4 py-2 bg-primary bg-opacity-20 rounded-full">
                        <p class="text-primary font-semibold text-sm">🎣 Tempat Memancing Terbaik</p>
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                        {{ $hero->title }}
                    </h1>

                    @if ($hero->subtitle)
                        <p class="text-lg md:text-xl text-gray-300 mb-8 leading-relaxed max-w-lg">
                            {{ $hero->subtitle }}
                        </p>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @if ($hero->button_text && $hero->button_link)
                            <x-button href="{{ $hero->button_link }}" variant="primary" icon="whatsapp" class="!px-8 !py-4">
                                {{ $hero->button_text }}
                            </x-button>
                        @endif
                        <x-button href="#fasilitas" variant="outline-white" icon="arrow-down" class="!px-8 !py-4">
                            Lihat Fasilitas
                        </x-button>
                    </div>
                </div>

                <!-- Right Stats -->
                @if ($hero->stats->isNotEmpty())
                    <div class="hidden md:flex items-center justify-center">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($hero->stats as $stat)
                                <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-8 border border-white border-opacity-20 text-center hover:bg-opacity-20 transition-all duration-300">
                                    <p class="text-4xl font-bold text-primary mb-2">{{ $stat->value }}</p>
                                    <p class="text-gray-300 text-sm font-medium">{{ $stat->label }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif