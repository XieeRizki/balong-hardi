@extends('layouts.admin')
@section('title', 'Kelola Blog')
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

    .table-card {
        background: white;
        border-radius: 10px;
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(135deg, var(--secondary) 0%, #111827 100%);
        color: white;
    }

    th {
        padding: 0.9rem;
        text-align: left;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 0.9rem;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
    }

    tbody tr {
        transition: background 0.15s ease;
    }

    tbody tr:hover {
        background: rgba(249, 115, 22, 0.03);
    }

    .title-cell {
        font-weight: 600;
        color: var(--secondary);
        max-width: 280px;
    }

    .category-cell {
        color: var(--neutral);
        font-size: 0.85rem;
    }

    .date-cell {
        color: var(--neutral);
        font-size: 0.85rem;
        white-space: nowrap;
    }

    .badge {
        display: inline-block;
        padding: 0.4rem 0.75rem;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-published {
        background: rgba(16, 185, 129, 0.15);
        color: #047857;
    }

    .badge-draft {
        background: rgba(234, 179, 8, 0.15);
        color: #92400E;
    }

    .action-group {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        padding: 0.5rem 0.8rem;
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
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.15);
        border-color: rgba(239, 68, 68, 0.3);
    }

    .empty-container {
        text-align: center;
        padding: 3rem 1.5rem;
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
        overflow-y: auto;
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
        max-width: 700px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        position: relative;
        margin: auto;
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
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 0.65rem 0.8rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.9rem;
        transition: all 0.15s ease;
        box-sizing: border-box;
        background: white;
    }

    input[type="text"]:focus,
    input[type="file"]:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
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

    .checkbox-wrap {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    input[type="checkbox"] {
        width: 1rem;
        height: 1rem;
        cursor: pointer;
        accent-color: var(--primary);
    }

    .checkbox-wrap label {
        margin: 0;
        font-weight: 500;
        font-size: 0.9rem;
        cursor: pointer;
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

    .image-preview {
        margin-bottom: 1rem;
    }

    .image-preview img {
        max-width: 200px;
        border-radius: 6px;
        border: 1px solid var(--border);
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

        th, td {
            padding: 0.7rem;
            font-size: 0.8rem;
        }

        th {
            font-size: 0.75rem;
        }

        .modal-content {
            padding: 1.5rem;
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
        <h1>Kelola Blog</h1>
        <p class="section-header-desc">Manage semua artikel blog Balong Hardi</p>
    </div>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Tulis Artikel
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th style="width: 140px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogPosts as $post)
                    <tr>
                        <td>
                            <div class="title-cell">{{ $post->title }}</div>
                        </td>
                        <td>
                            <span class="category-cell">{{ $post->category ?? '-' }}</span>
                        </td>
                        <td>
                            <span class="date-cell">{{ $post->created_at->format('d M Y') }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $post->is_published ? 'badge-published' : 'badge-draft' }}">
                                {{ $post->is_published ? '✓ Dipublikasi' : '✗ Draft' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <button onclick="openEditBlogModal({{ $post->id }})" class="btn-icon btn-edit" data-blog-id="{{ $post->id }}" data-title="{{ $post->title }}" data-category="{{ $post->category }}" data-excerpt="{{ $post->excerpt }}" data-content="{{ str_replace('"', '&quot;', $post->content) }}" data-is-published="{{ $post->is_published }}" data-image="{{ $post->image }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" style="border: none; padding: 0.5rem 0.8rem;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-container">
                                <div class="empty-icon">📭</div>
                                <p class="empty-text">Belum ada artikel</p>
                                <a href="{{ route('admin.blog-posts.create') }}" class="btn-create">
                                    <i class="fas fa-plus"></i> Tulis Artikel
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($blogPosts->hasPages())
        <div style="padding: 1rem; text-align: center; border-top: 1px solid var(--border);">
            {{ $blogPosts->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>

<!-- Modal Edit Blog -->
<div class="modal-overlay" id="editBlogModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editBlogModal')">&times;</button>
        <div class="modal-header">
            <h2>✏️ Edit Artikel</h2>
            <p>Perbarui informasi artikel blog</p>
        </div>

        <form action="" method="POST" id="editBlogForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit_title">Judul Artikel <span class="required">*</span></label>
                <input type="text" id="edit_title" name="title" required>
                @error('title')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_category">Kategori</label>
                <input type="text" id="edit_category" name="category" placeholder="Contoh: Tips & Trik, Berita, Tutorial">
                @error('category')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_excerpt">Ringkasan</label>
                <textarea id="edit_excerpt" name="excerpt"></textarea>
                @error('excerpt')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_content">Konten Artikel <span class="required">*</span></label>
                <textarea id="edit_content" name="content" required></textarea>
                <div class="form-hint">Gunakan format plain text atau HTML</div>
                @error('content')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="edit_image">Gambar Sampul</label>
                <div id="edit_image_preview" class="image-preview"></div>
                <input type="file" id="edit_image" name="image" accept="image/*" onchange="previewImageBlog()">
                <div class="form-hint">JPG, PNG · Maks 2MB</div>
                @error('image')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <div class="checkbox-wrap">
                    <input type="checkbox" id="edit_is_published" name="is_published" value="1">
                    <label for="edit_is_published">✓ Publikasi Artikel</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-cancel" onclick="closeModal('editBlogModal')">
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

    function openEditBlogModal(postId) {
        const button = event.target.closest('.btn-edit');
        const data = {
            id: button.getAttribute('data-blog-id'),
            title: button.getAttribute('data-title'),
            category: button.getAttribute('data-category'),
            excerpt: button.getAttribute('data-excerpt'),
            content: button.getAttribute('data-content').replace(/&quot;/g, '"'),
            isPublished: button.getAttribute('data-is-published'),
            image: button.getAttribute('data-image')
        };

        document.getElementById('editBlogForm').action = `/admin/blog-posts/${postId}`;
        document.getElementById('edit_title').value = data.title;
        document.getElementById('edit_category').value = data.category;
        document.getElementById('edit_excerpt').value = data.excerpt;
        document.getElementById('edit_content').value = data.content;
        document.getElementById('edit_is_published').checked = data.isPublished == 1;

        const previewDiv = document.getElementById('edit_image_preview');
        if (data.image) {
            previewDiv.innerHTML = `<img src="{{ asset('storage/') }}${data.image}" alt="Preview">`;
        } else {
            previewDiv.innerHTML = '';
        }

        openModal('editBlogModal');
    }

    function previewImageBlog() {
        const file = document.getElementById('edit_image').files[0];
        const preview = document.getElementById('edit_image_preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    }

    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(modal => {
                closeModal(modal.id);
            });
        }
    });
</script>

@endsection