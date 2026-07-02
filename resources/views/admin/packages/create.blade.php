@extends('layouts.admin')

@section('title', 'Tambah Paket')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-secondary">Tambah Paket Baru</h1>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-2xl">
    <form action="{{ route('admin.packages.store') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Nama Paket</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Harga (Rp)</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
            @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Durasi</label>
            <input type="text" name="duration" value="{{ old('duration') }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="Contoh: 6 jam, 12 jam" required>
            @error('duration') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Fitur (Satu per baris)</label>
            <textarea name="features" rows="6" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="Akses kolam penuh&#10;WiFi gratis&#10;Kamar mandi">{{ old('features') }}</textarea>
            @error('features') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }} class="w-4 h-4">
                <span class="ml-3 text-secondary font-bold">Paket Paling Populer</span>
            </label>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} class="w-4 h-4">
                <span class="ml-3 text-secondary font-bold">Aktifkan Paket</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                Simpan Paket
            </button>
            <a href="{{ route('admin.packages.index') }}" class="px-6 py-3 bg-gray-400 text-white font-bold rounded-lg hover:bg-gray-500 transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection