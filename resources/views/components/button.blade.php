{{--
    Reusable button. Dipake buat semua CTA (Hubungi Sekarang, Pesan Sekarang,
    Kirim Pesan, dll) biar style-nya konsisten dan gak copy-paste class Tailwind
    berulang-ulang di tiap section.

    Usage:
    <x-button href="https://wa.me/6281234567890" variant="primary" icon="whatsapp">
        Hubungi Sekarang
    </x-button>

    <x-button type="submit" variant="primary" class="w-full">
        Kirim Pesan
    </x-button>
--}}
@props([
    'href' => null,
    'type' => 'button', // dipake kalau href null (jadi <button>)
    'variant' => 'primary', // primary | secondary | outline | outline-white
    'icon' => null, // 'whatsapp' | 'arrow-right' | 'arrow-down' | null
])

@php
    $base = 'px-6 py-3 font-bold rounded-xl transition-all duration-300 flex items-center justify-center space-x-2';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-dark shadow-lg hover:shadow-xl hover:-translate-y-1',
        'secondary' => 'bg-secondary text-white hover:bg-secondary-light',
        'outline' => 'border-2 border-primary text-primary hover:bg-primary hover:text-white',
        'outline-white' => 'border-2 border-white text-white hover:bg-white hover:text-secondary',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon === 'whatsapp')
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
            </svg>
        @elseif ($icon === 'arrow-right')
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        @elseif ($icon === 'arrow-down')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        @endif
        <span>{{ $slot }}</span>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        <span>{{ $slot }}</span>
    </button>
@endif
