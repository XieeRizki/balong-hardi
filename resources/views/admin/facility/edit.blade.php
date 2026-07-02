@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-secondary">Edit Fasilitas: {{ $facility->name }}</h1>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-2xl">
    <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Nama Fasilitas</label>
            <input type="text" name="name" value="{{ old('name', $facility->name) }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Deskripsi</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>{{ old('description', $facility->description) }}</textarea>
            @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Gambar</label>
            @if($facility->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary">
            @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Icon (Optional)</label>
            <input type="text" name="icon" value="{{ old('icon', $facility->icon) }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="Contoh: home, settings, etc">
            @error('icon') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Urutan</label>
            <input type="number" name="order" value="{{ old('order', $facility->order) }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary">
            @error('order') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $facility->is_active) ? 'checked' : '' }} class="w-4 h-4">
                <span class="ml-3 text-secondary font-bold">Aktifkan Fasilitas</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.facilities.index') }}" class="px-6 py-3 bg-gray-400 text-white font-bold rounded-lg hover:bg-gray-500 transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection