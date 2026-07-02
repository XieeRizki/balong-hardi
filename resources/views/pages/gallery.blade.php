@extends('layouts.app')

@section('title', 'Galeri - Balong Hardi Sumedang')

@section('content')

    <section class="py-20 md:py-32 bg-white">
        <div class="container-max">
            <x-section-title
                badge="Galeri"
                title="Suasana Balong Hardi"
                subtitle="Lihat lebih dekat suasana kolam, fasilitas, dan momen seru pengunjung kami"
            />

            @if ($categories->isNotEmpty())
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <a href="{{ route('gallery') }}"
                       class="px-5 py-2 rounded-full text-sm font-semibold transition-all {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('gallery', ['category' => $category]) }}"
                           class="px-5 py-2 rounded-full text-sm font-semibold capitalize transition-all {{ request('category') === $category ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($galleries->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($galleries as $gallery)
                        <x-gallery-card :gallery="$gallery" />
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $galleries->links() }}
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada foto di kategori ini.</p>
            @endif
        </div>
    </section>

@endsection
