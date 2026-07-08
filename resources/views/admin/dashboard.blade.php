@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-header {
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.25rem;
    }

    .dashboard-header p {
        font-size: 0.9rem;
        color: var(--neutral);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        padding: 1.25rem;
        border-radius: 10px;
        border: 1px solid var(--border);
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: rgba(249, 115, 22, 0.08);
        border-radius: 50%;
        transform: translate(40%, -40%);
    }

    .stat-card:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.1);
        transform: translateY(-2px);
    }

    .stat-label {
        font-size: 0.75rem;
        color: var(--neutral);
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .stat-icon {
        font-size: 1.5rem;
        opacity: 0.7;
        position: relative;
        z-index: 1;
    }

    .quick-actions {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        border: 1px solid var(--border);
        margin-bottom: 2rem;
    }

    .quick-actions h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .quick-actions h2 i {
        color: var(--primary);
        font-size: 1.2rem;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 0.75rem;
    }

    .action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: white;
        border: 2px solid var(--border);
        border-radius: 8px;
        text-decoration: none;
        color: var(--secondary);
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .action-btn:hover {
        border-color: var(--primary);
        background: rgba(249, 115, 22, 0.05);
        color: var(--primary);
        transform: translateY(-1px);
    }

    .action-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .recent-posts {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        border: 1px solid var(--border);
    }

    .recent-posts h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .recent-posts h2 i {
        color: var(--primary);
        font-size: 1.2rem;
    }

    .post-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .post-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.875rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .post-item:hover {
        background: rgba(249, 115, 22, 0.05);
        border-color: var(--primary);
    }

    .post-info {
        flex: 1;
    }

    .post-title {
        font-weight: 600;
        color: var(--secondary);
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }

    .post-date {
        font-size: 0.8rem;
        color: var(--neutral);
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.35rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-success {
        background: rgba(16, 185, 129, 0.15);
        color: #047857;
    }

    .badge-warning {
        background: rgba(245, 158, 11, 0.15);
        color: #92400e;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .dashboard-header h1 {
            font-size: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 0.75rem;
        }

        .stat-card {
            padding: 1rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-btn {
            padding: 0.875rem;
            font-size: 0.8rem;
        }

        .action-btn i {
            font-size: 1.25rem;
            margin-bottom: 0.35rem;
        }

        .post-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .post-info {
            width: 100%;
        }
    }
</style>

<div class="dashboard-header">
    <h1>Dashboard</h1>
    <p>Selamat datang kembali, Admin!</p>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Fasilitas</div>
        <div class="stat-value">{{ $stats['facilities'] }}</div>
        <!-- <div class="stat-icon">🏊</div> -->
    </div>

    <div class="stat-card">
        <div class="stat-label">Paket</div>
        <div class="stat-value">{{ $stats['packages'] }}</div>
        <!-- <div class="stat-icon">📦</div> -->
    </div>

    <div class="stat-card">
        <div class="stat-label">Blog</div>
        <div class="stat-value">{{ $stats['blog_posts'] }}</div>
        <!-- <div class="stat-icon">📝</div> -->
    </div>

    <div class="stat-card">
        <div class="stat-label">Testimoni</div>
        <div class="stat-value">{{ $stats['testimonials'] }}</div>
        <!-- <div class="stat-icon">⭐</div> -->
    </div>

    <div class="stat-card">
        <div class="stat-label">Galeri</div>
        <div class="stat-value">{{ $stats['galleries'] }}</div>
        <!-- <div class="stat-icon">🖼️</div> -->
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h2>
        <i class="fas fa-rocket"></i>
        Akses Cepat
    </h2>
    <div class="actions-grid">
        <a href="{{ route('admin.facility.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            Fasilitas
        </a>
        <a href="{{ route('admin.packages.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            Paket
        </a>
        <a href="{{ route('admin.blog-posts.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            Blog
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            Testimoni
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="action-btn">
            <i class="fas fa-plus"></i>
            Galeri
        </a>
    </div>
</div>

<!-- Recent Posts -->
@if($recentPosts->count() > 0)
    <div class="recent-posts">
        <h2>
            <i class="fas fa-list"></i>
            Blog Terbaru
        </h2>
        <div class="post-list">
            @foreach($recentPosts as $post)
                <div class="post-item">
                    <div class="post-info">
                        <div class="post-title">{{ $post->title }}</div>
                        <div class="post-date">{{ $post->published_at?->format('d M Y') ?? 'Belum dipublikasi' }}</div>
                    </div>
                    <div>
                        @if($post->is_published)
                            <span class="badge badge-success">✓ Dipublikasi</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection
