{{--
    Satu kartu foto galeri. Dipake di halaman /gallery dengan @foreach.
--}}
@props(['gallery'])

<div class="card-modern overflow-hidden group relative">
    <div class="relative h-64 overflow-hidden">
        <img src="{{ asset('storage/' . $gallery->image) }}"
             alt="{{ $gallery->title ?? 'Galeri Balong Hardi' }}"
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

        @if ($gallery->title)
            <div class="absolute bottom-0 left-0 right-0 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-white font-bold">{{ $gallery->title }}</p>
                @if ($gallery->category)
                    <p class="text-white/80 text-xs uppercase tracking-wider">{{ $gallery->category }}</p>
                @endif
            </div>
        @endif
    </div>
</div>
