{{--
    Layout reusable buat halaman "Lihat Selengkapnya" -- dipake bareng buat
    Blog, Fasilitas, atau konten detail lainnya nanti.

    Cara pakai (di halaman page lain):
    <x-detail-page
        title="Judul Konten"
        badge="Kategori/Label"
        image="path/ke/gambar.jpg"
        backUrl="{{ route('home') }}#fasilitas"
        backLabel="Kembali ke Fasilitas"
    >
        Isi konten bebas di sini (paragraf, list, apapun) -- ini jadi $slot.
    </x-detail-page>
--}}
@props([
    'title',
    'badge' => null,
    'image' => null,
    'backUrl' => null,
    'backLabel' => 'Kembali',
    'meta' => null, // teks kecil opsional, misal tanggal publish
])

<article>
    {{-- Header: gambar besar + judul + badge, mirip hero tapi lebih pendek --}}
    <section class="relative bg-secondary overflow-hidden">
        @if ($image)
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 bg-gradient-to-t from-secondary via-secondary/80 to-secondary/40"></div>
            </div>
        @endif

        <div class="container-max relative z-10 pt-28 pb-16 md:pt-36 md:pb-20">
            @if ($backUrl)
                <a href="{{ $backUrl }}" class="inline-flex items-center gap-2 text-gray-300 hover:text-white text-sm font-medium mb-6 transition-colors duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    {{ $backLabel }}
                </a>
            @endif

            @if ($badge)
                <span class="inline-block px-4 py-2 bg-primary/20 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">
                    {{ $badge }}
                </span>
            @endif

            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight max-w-3xl">
                {{ $title }}
            </h1>

            @if ($meta)
                <p class="text-gray-400 text-sm mt-4">{{ $meta }}</p>
            @endif
        </div>
    </section>

    {{-- Isi konten -- bebas, tergantung apa yang dipass sebagai slot --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="container-max max-w-3xl">
            {{ $slot }}
        </div>
    </section>
</article>