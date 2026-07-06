@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-secondary">Edit Artikel: {{ $blogPost->title }}</h1>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-4xl">
    <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Judul Artikel</label>
            <input type="text" name="title" value="{{ old('title', $blogPost->title) }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
            @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Kategori</label>
            <input type="text" name="category" value="{{ old('category', $blogPost->category) }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary">
            @error('category') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Ringkasan</label>
            <textarea name="excerpt" rows="3" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
            @error('excerpt') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Konten Artikel</label>
            <textarea name="content" rows="15" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary font-mono" required>{{ old('content', $blogPost->content) }}</textarea>
            @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-secondary font-bold mb-2">Gambar Sampul</label>
            @if($blogPost->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $blogPost->image) }}" alt="{{ $blogPost->title }}" class="w-64 h-40 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-primary">
            @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }} class="w-4 h-4">
                <span class="ml-3 text-secondary font-bold">✓ Publikasi Artikel</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.blog-posts.index') }}" class="px-6 py-3 bg-gray-400 text-white font-bold rounded-lg hover:bg-gray-500 transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection