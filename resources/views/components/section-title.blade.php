{{--
    Reusable section header: small badge label, big heading, optional subtitle.
    Dipake di hampir semua section (Tentang, Fasilitas, Harga, Testimoni, dst)
    biar gak nulis ulang markup yang sama tiap section.

    Usage:
    <x-section-title
        badge="Fasilitas Kami"
        title="Lengkap & Nyaman"
        subtitle="Semua yang Anda butuhkan untuk pengalaman memancing yang maksimal"
    />
--}}
@props([
    'badge' => null,
    'title',
    'subtitle' => null,
    'align' => 'center', // center | left
])

@php
    $alignClass = $align === 'left' ? 'text-left' : 'text-center';
    $subtitleMargin = $align === 'left' ? '' : 'mx-auto';
@endphp

<div class="{{ $alignClass }} mb-16 md:mb-20">
    @if ($badge)
        <span class="inline-block px-4 py-2 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-bold uppercase tracking-wider mb-4">
            {{ $badge }}
        </span>
    @endif

    <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-6">
        {{ $title }}
    </h2>

    @if ($subtitle)
        <p class="text-gray-600 text-lg max-w-2xl {{ $subtitleMargin }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
