@extends('layouts.admin')
@section('title', 'Edit Artikel')
@section('content')

<style>
    .form-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0 0 0.3rem 0;
    }

    .form-header p {
        font-size: 0.85rem;
        color: var(--neutral);
        margin: 0 0 1.5rem 0;
    }

    .form-box {
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 1.5rem;
        max-width: 720px;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    label {
        display: block;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .required {
        color: var(--danger);
        margin-left: 0.2rem;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 0.75rem 0.9rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.9rem;
        transition: all 0.15s ease;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="file"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    }

    textarea {
        resize: vertical;
    }

    #excerpt {
        min-height: 80px;
    }

    #content {
        min-height: 280px;
        line-height: 1.6;
    }

    .form-hint {
        font-size: 0.8rem;
        color: var(--neutral);
        margin-top: 0.35rem;
    }

    .char-counter {
        font-size: 0.75rem;
        color: var(--neutral);
        text-align: right;
        margin-top: 0.35rem;
    }

    .char-counter.warn {
        color: var(--danger);
        font-weight: 600;
    }

    .form-error {
        font-size: 0.8rem;
        color: var(--danger);
        margin-top: 0.35rem;
    }

    .image-preview-box {
        margin: 0.75rem 0;
    }

    .image-preview-box img {
        max-width: 280px;
        max-height: 160px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid var(--border);
    }

    .status-badge {
        display: inline-block;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-left: 0.5rem;
    }

    .status-published {
        background: rgba(16, 185, 129, 0.15);
        color: #047857;
    }

    .status-draft {
        background: rgba(107, 114, 128, 0.15);
        color: #4B5563;
    }

    .checkbox-wrap {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: rgba(249, 115, 22, 0.05);
        border: 1px solid rgba(249, 115, 22, 0.2);
        border-radius: 8px;
        padding: 0.9rem 1rem;
    }

    input[type="checkbox"] {
        width: 1.1rem;
        height: 1.1rem;
        cursor: pointer;
        accent-color: var(--primary);
        flex-shrink: 0;
    }

    .checkbox-wrap label {
        margin: 0;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.85rem;
    }

    .form-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 2rem;
    }

    .btn {
        flex: 1;
        padding: 0.85rem;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .btn-back {
        background: var(--border);
        color: var(--secondary);
    }

    .btn-back:hover {
        background: #D1D5DB;
    }

    @media (max-width: 768px) {
        .form-box {
            padding: 1.25rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="form-header">
    <h1>
        ✏️ Edit Artikel
        @if($blogPost->is_published)
            <span class="status-badge status-published">Terbit</span>
        @else
            <span class="status-badge status-draft">Draft</span>
        @endif
    </h1>
    <p>{{ $blogPost->title }}</p>
</div>

<div class="form-box">
    <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul Artikel <span class="required">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $blogPost->title) }}" required>
            @error('title')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" id="category" name="category" value="{{ old('category', $blogPost->category) }}">
            @error('category')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="excerpt">Ringkasan</label>
            <textarea id="excerpt" name="excerpt" maxlength="500"
                      oninput="updateCounter('excerpt', 'excerptCounter', 500)">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
            <div class="char-counter" id="excerptCounter">0 / 500</div>
            @error('excerpt')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="content">Isi Artikel <span class="required">*</span></label>
            <textarea id="content" name="content" required>{{ old('content', $blogPost->content) }}</textarea>
            <div class="form-hint">Boleh pakai paragraf biasa (baris baru otomatis jadi ganti paragraf)</div>
            @error('content')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar Sampul</label>
            @if($blogPost->image)
                <div class="image-preview-box">
                    <img src="{{ asset('storage/' . $blogPost->image) }}" alt="{{ $blogPost->title }}">
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <div class="form-hint">Kosongkan kalau gak mau ganti gambar</div>
            @error('image')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <div class="checkbox-wrap">
                <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}>
                <label for="is_published">✓ Publikasikan artikel ini</label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Batal
            </a>
        </div>
    </form>
</div>

<script>
    function updateCounter(fieldId, counterId, max) {
        const field = document.getElementById(fieldId);
        const counter = document.getElementById(counterId);
        const len = field.value.length;
        counter.textContent = `${len} / ${max}`;
        counter.classList.toggle('warn', len > max * 0.9);
    }
    updateCounter('excerpt', 'excerptCounter', 500);
</script>

@endsection