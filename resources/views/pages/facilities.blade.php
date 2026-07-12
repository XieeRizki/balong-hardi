@extends('layouts.app')

@section('title', 'Fasilitas - Balong Hardi Sumedang')

@section('content')

    <section class="py-20 md:py-32 bg-light">
        <div class="container-max">
            <x-section-title
                badge="Fasilitas Kami"
                title="Lengkap & Nyaman"
                subtitle="Semua yang Anda butuhkan untuk pengalaman memancing yang maksimal"
            />

            @if ($facilities->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($facilities as $facility)
                        <x-facility-card :facility="$facility" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada fasilitas yang ditambahkan.</p>
            @endif
        </div>
    </section>

@endsection