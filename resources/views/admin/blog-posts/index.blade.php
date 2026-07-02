@extends('layouts.admin')

@section('title', 'Kelola Blog')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-secondary">Kelola Blog</h1>
        <p class="text-gray-600">Manage semua artikel blog</p>
    </div>
    <a href="{{ route('admin.blog-posts.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
        + Tulis Artikel
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-secondary text-white">
            <tr>
                <th class="px-6 py-4 text-left">Judul</th>
                <th class="px-6 py-4 text-left">Kategori</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-left">Tanggal</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold text-secondary">{{ $post->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $post->category }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $post->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $post->is_published ? '✓ Dipublikasi' : '⏱ Draft' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $post->published_at?->format('d M Y') ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.blog-posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-4">Edit</a>
                        <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-600">
                        Belum ada artikel. <a href="{{ route('admin.blog-posts.create') }}" class="text-primary font-semibold">Tulis sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection