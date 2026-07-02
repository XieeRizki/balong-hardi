@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-secondary mb-2">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di Admin Panel Balong Hardi</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Fasilitas</p>
                <p class="text-3xl font-bold text-secondary">{{ $stats['facilities'] }}</p>
            </div>
            <div class="text-4xl">🏢</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Paket</p>
                <p class="text-3xl font-bold text-secondary">{{ $stats['packages'] }}</p>
            </div>
            <div class="text-4xl">📦</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Blog</p>
                <p class="text-3xl font-bold text-secondary">{{ $stats['blog_posts'] }}</p>
            </div>
            <div class="text-4xl">📝</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Testimoni</p>
                <p class="text-3xl font-bold text-secondary">{{ $stats['testimonials'] }}</p>
            </div>
            <div class="text-4xl">⭐</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-all">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Galeri</p>
                <p class="text-3xl font-bold text-secondary">{{ $stats['galleries'] }}</p>
            </div>
            <div class="text-4xl">🖼️</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold text-secondary mb-6">Akses Cepat</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <a href="{{ route('admin.facility.create') }}" class="p-4 bg-blue-50 border-l-4 border-blue-500 hover:bg-blue-100 transition-all rounded">
            <p class="font-bold text-blue-900">+ Tambah Fasilitas</p>
        </a>
        <a href="{{ route('admin.package.create') }}" class="p-4 bg-green-50 border-l-4 border-green-500 hover:bg-green-100 transition-all rounded">
            <p class="font-bold text-green-900">+ Tambah Paket</p>
        </a>
        <a href="{{ route('admin.blog-post.create') }}" class="p-4 bg-purple-50 border-l-4 border-purple-500 hover:bg-purple-100 transition-all rounded">
            <p class="font-bold text-purple-900">+ Tulis Blog</p>
        </a>
        <a href="{{ route('admin.testimonial.create') }}" class="p-4 bg-yellow-50 border-l-4 border-yellow-500 hover:bg-yellow-100 transition-all rounded">
            <p class="font-bold text-yellow-900">+ Tambah Testimoni</p>
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="p-4 bg-pink-50 border-l-4 border-pink-500 hover:bg-pink-100 transition-all rounded">
            <p class="font-bold text-pink-900">+ Upload Galeri</p>
        </a>
    </div>
</div>
@endsection