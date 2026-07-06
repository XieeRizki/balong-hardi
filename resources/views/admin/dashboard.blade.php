@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-header {
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
    }

    .dashboard-header p {
        color: #6B7280;
        font-size: 0.95rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-top: 4px solid var(--primary);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 80px;
        height: 80px;
        background: rgba(255, 107, 53, 0.05);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .stat-card.facilities {
        border-top-color: #00A8E8;
    }

    .stat-card.packages {
        border-top-color: #06D6A0;
    }

    .stat-card.blog {
        border-top-color: #FFB703;
    }

    .stat-card.testimonials {
        border-top-color: #EF476F;
    }

    .stat-card.gallery {
        border-top-color: #9D4EDD;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #6B7280;
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
    }

    .stat-icon {
        font-size: 2rem;
        opacity: 0.8;
        position: relative;
        z-index: 1;
    }

    .quick-actions {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .quick-actions h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(0, 168, 232, 0.1) 100%);
        border: 2px solid transparent;
        border-radius: 10px;
        text-decoration: none;
        color: var(--secondary);
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .action-btn:hover {
        border-color: var(--primary);
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        color: white;
        transform: translateX(4px);
    }

    .action-btn i {
        font-size: 1.25rem;
        width: 1.5rem;
    }

    .recent-posts {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
    }

    .recent-posts h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1.5rem;
    }

    .post-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #E5E7EB;
    }

    .post-item:last-child {
        border-bottom: none;
    }

    .post-title {
        font-weight: 600;
        color: var(--secondary);
    }

    .post-date {
        font-size: 0.875rem;
        color: #9CA3AF;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-success {
        background-color: rgba(6, 214, 160, 0.1);
        color: #047857;
    }

    .badge-warning {
        background-color: rgba(255, 183, 3, 0.1);
        color: #92400e;
    }
</style>

<div class="dashboard-header">
    <h1>🎯 Dashboard</h1>
    <p>Selamat datang di Admin Panel Balong Hardi</p>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card facilities">
        <div class="stat-label">Total Fasilitas</div>
        <div class="stat-value">{{ $stats['facilities'] }}</div>
        <div class="stat-icon">🏊</div>
    </div>

    <div class="stat-card packages">
        <div class="stat-label">Total Paket</div>
        <div class="stat-value">{{ $stats['packages'] }}</div>
        <div class="stat-icon">📦</div>
    </div>

    <div class="stat-card blog">
        <div class="stat-label">Total Blog</div>
        <div class="stat-value">{{ $stats['blog_posts'] }}</div>
        <div class="stat-icon">📝</div>
    </div>

    <div class="stat-card testimonials">
        <div class="stat-label">Total Testimoni</div>
        <div class="stat-value">{{ $stats['testimonials'] }}</div>
        <div class="stat-icon">⭐</div>
    </div>

    <div class="stat-card gallery">
        <div class="stat-label">Total Galeri</div>
        <div class="stat-value">{{ $stats['galleries'] }}</div>
        <div class="stat-icon">🖼️</div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h2>
        <i class="fas fa-lightning-bolt" style="color: var(--primary);"></i>
        Akses Cepat
    </h2>
    <div class="actions-grid">
        <a href="{{ route('admin.facility.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            <span>Tambah Fasilitas</span>
        </a>
        <a href="{{ route('admin.packages.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            <span>Tambah Paket</span>
        </a>
        <a href="{{ route('admin.blog-posts.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            <span>Tulis Blog</span>
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            <span>Tambah Testimoni</span>
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            <span>Upload Galeri</span>
        </a>
    </div>
</div>

<!-- Recent Posts -->
@if($recentPosts->count() > 0)
    <div class="recent-posts" style="margin-top: 2rem;">
        <h2>
            <i class="fas fa-history" style="color: var(--primary);"></i>
            Blog Terbaru
        </h2>
        @foreach($recentPosts as $post)
            <div class="post-item">
                <div>
                    <div class="post-title">{{ $post->title }}</div>
                    <div class="post-date">{{ $post->published_at?->format('d M Y') ?? 'Belum dipublikasi' }}</div>
                </div>
                <div>
                    @if($post->is_published)
                        <span class="badge badge-success">Dipublikasi</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection