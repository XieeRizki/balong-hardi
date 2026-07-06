@extends('layouts.admin')
@section('title', 'Kelola Galeri')
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
        margin: 0;
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

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.25rem;
    }

    .gallery-card {
        background: white;
        border-radius: 10px;
        border: 1px solid var(--border);
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .gallery-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .gallery-image {
        position: relative;
        height: 190px;
        overflow: hidden;
        background: #E5E7EB;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .gallery-body {
        padding: 1rem 1.1rem 1.1rem;
    }

    .gallery-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.35rem 0;
    }

    .gallery-category {
        display: inline-block;
        padding: 0.25rem 0.65rem;
        background: rgba(249, 115, 22, 0.1);
        color: var(--primary-dark);
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 5px;
        margin-bottom: 1rem;
    }

    .gallery-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.35rem;
        flex: 1;
        padding: 0.55rem 0.8rem;
        border: 1px solid;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .btn-edit {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
        border-color: rgba(59, 130, 246, 0.2);
    }

    .btn-edit:hover {
        background: rgba(59, 130, 246, 0.15);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border-color: rgba(239, 68, 68, 0.2);
        width: 100%;
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: rgba(239, 68, 68, 0.3);
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

    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        animation: fadeIn 0.2s ease;
    }

    .modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .modal-header {
        margin-bottom: 1.5rem;
    }

    .modal-header h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.25rem 0;
    }

    .modal-header p {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0;
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--neutral);
        cursor: pointer;
        width: 2rem;
        height: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .modal-close:hover {
        background: var(--border);
        color: var(--secondary);
    }

    .form-group {
        margin-bottom: 1.1rem;
    }

    label {
        display: block;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.4rem;
        font-size: 0.85rem;
    }

    .required {
        color: var(--danger);
        margin-left: 0.2rem;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 0.65rem 0.8rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.9rem;
        transition: all 0.15s ease;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    }

    .form-hint {
        font-size: 0.75rem;
        color: var(--neutral);
        margin-top: 0.3rem;
    }

    .form-error {
        font-size: 0.75rem;
        color: var(--danger);
        margin-top: 0.3rem;
    }

    .form-actions {
        display: flex;
        gap: 0.6rem;
        margin-top: 1.5rem;
    }

    .btn {
        flex: 1;
        padding: 0.75rem;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .btn-cancel {
        background: var(--border);
        color: var(--secondary);
    }

    .btn-cancel:hover {
        background: #D1D5DB;
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

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .modal-content {
            padding: 1.5rem;
            margin: 1rem;
        }

        .modal-header h2 {
            font-size: 1.1rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="section-header">
    <div>
        <h1>🖼️ Kelola Galeri</h1>
        <p class="section-header-desc">Manage semua foto galeri</p>
    </div>
    <button class="btn-create" onclick="openModal('addModal')">
        <i class="fas fa-plus"></i> Upload Foto
    </button>
</div>

<div class="gallery-grid">
    @forelse($galleries as $gallery)
        <div class="gallery-card">
            <div class="gallery-image">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
            </div>
            <div class="gallery-body">
                <h3 class="gallery-title">{{ $gallery->title }}</h3>
                <span class="gallery-category">{{ $gallery->category }}</span>
                <div class="gallery-actions">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn-icon btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-icon btn-delete">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-container">
            <div class="empty-icon">📭</div>
            <p class="empty-text">Belum ada foto galeri</p>
            <button class="btn-create" onclick="openModal('addModal')">
                <i class="fas fa-plus"></i> Upload Foto Pertama
            </button>
        </div>
    @endforelse
</div>

@if($galleries->hasPages())
    <div style="padding: 1.5rem 0; text-align: center;">
        {{ $galleries->links('pagination::bootstrap-4') }}
    </div>
@endif

<!-- Modal Upload Foto -->
<div class="modal-overlay" id="addModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addModal')">&times;</button>
        <div class="modal-header">
            <h2>📤 Upload Foto</h2>
            <p>Tambahkan foto baru ke galeri Balong Hardi</p>
        </div>

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Judul Foto <span class="required">*</span></label>
                <input type="text" id="title" name="title" placeholder="Contoh: Kolam Renang Sore Hari" value="{{ old('title') }}" required>
                @error('title')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="category">Kategori <span class="required">*</span></label>
                <input type="text" id="category" name="category" placeholder="Contoh: Kolam, Fasilitas, Event" value="{{ old('category') }}" required>
                @error('category')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="image">Foto <span class="required">*</span></label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <div class="form-hint">JPG, PNG · Maks 2MB</div>
                @error('image')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-cancel" onclick="closeModal('addModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });
</script>

@endsection