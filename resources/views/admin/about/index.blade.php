@extends('layouts.admin')
@section('title', 'Tentang Kami')
@section('content')

<style>
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .section-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0;
    }

    .section-header-desc {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0.2rem 0 0 0;
    }

    .btn-create {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.25rem;
    }

    .item-card {
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.15s ease;
    }

    .item-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transform: translateY(-3px);
    }

    .item-thumb-wrap {
        position: relative;
        height: 150px;
        background: var(--bg-light);
    }

    .item-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .item-thumb-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #D1D5DB;
        font-size: 2rem;
        background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
    }

    .item-actions {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        display: flex;
        gap: 0.35rem;
    }

    .item-actions a,
    .item-actions button {
        width: 28px;
        height: 28px;
        border-radius: 6px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.75rem;
        text-decoration: none;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        transition: all 0.15s ease;
    }

    .act-edit {
        background: white;
        color: #3B82F6;
    }

    .act-edit:hover {
        background: #3B82F6;
        color: white;
    }

    .act-delete {
        background: white;
        color: #EF4444;
    }

    .act-delete:hover {
        background: #EF4444;
        color: white;
    }

    .item-badge {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        font-size: 0.65rem;
        font-weight: 700;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        background: rgba(249, 115, 22, 0.9);
        color: white;
    }

    .item-body {
        padding: 0.9rem 1rem;
    }

    .item-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.35rem 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .item-desc {
        font-size: 0.8rem;
        color: var(--neutral);
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
    }

    .empty-container {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem 1.5rem;
        background: white;
        border-radius: 10px;
        border: 1px solid var(--border);
    }

    .empty-icon {
        font-size: 3rem;
        color: #D1D5DB;
        margin-bottom: 1rem;
    }

    .empty-text {
        color: var(--neutral);
        font-size: 0.95rem;
        margin: 0 0 1.5rem 0;
    }

    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-create {
            width: 100%;
            justify-content: center;
        }

        .card-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
    }
</style>

<div class="section-header">
    <div>
        <h1>Tentang Kami</h1>
        <p class="section-header-desc">Kelola konten halaman "Tentang Kami" dan manfaatnya</p>
    </div>
    <a href="{{ route('admin.about.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Tambah Tentang
    </a>
</div>

@if (session('success'))
    <div style="margin-bottom: 1.25rem; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 6px; padding: 0.9rem 1.1rem; color: #047857; font-size: 0.85rem;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="card-grid">
    @forelse ($abouts as $about)
        <div class="item-card">
            <div class="item-thumb-wrap">
                @if ($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                @else
                    <div class="item-thumb-placeholder"><i class="fas fa-image"></i></div>
                @endif

                <span class="item-badge">{{ $about->benefits->count() }} manfaat</span>

                <div class="item-actions">
                    <a href="{{ route('admin.about.edit', $about) }}" class="act-edit" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('admin.about.destroy', $about) }}" method="POST" onsubmit="return confirm('Hapus konten ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="act-delete" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="item-body">
                <p class="item-title" title="{{ $about->title }}">{{ $about->title }}</p>
                <p class="item-desc">{{ Str::limit(strip_tags($about->description), 90) }}</p>
            </div>
        </div>
    @empty
        <div class="empty-container">
            <div class="empty-icon">📭</div>
            <p class="empty-text">Belum ada konten "Tentang Kami"</p>
            <a href="{{ route('admin.about.create') }}" class="btn-create">
                <i class="fas fa-plus"></i> Buat Pertama
            </a>
        </div>
    @endforelse
</div>

@if ($abouts->isNotEmpty() && $abouts->hasPages())
    <div style="padding: 1.5rem 0; text-align: center;">
        {{ $abouts->links() }}
    </div>
@endif

@endsection