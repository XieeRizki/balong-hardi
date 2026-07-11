@extends('layouts.admin')
@section('title', 'Tulis Artikel')
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
    <h1>📝 Tulis Artikel Baru</h1>
    <p>Buat artikel blog baru untuk ditampilkan di website</p>
</div>

<div class="form-box">
    <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Judul Artikel <span class="required">*</span></label>
            <input type="text" id="title" name="title" placeholder="Contoh: 5 Tips Memancing di Musim Hujan"
                   value="{{ old('title') }}" required>
            @error('title')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" id="category" name="category" placeholder="Contoh: Tips & Trik, Berita, Tutorial"
                   value="{{ old('category') }}">
            <div class="form-hint">Kosongkan kalau gak perlu kategori</div>
            @error('category')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="excerpt">Ringkasan</label>
            <textarea id="excerpt" name="excerpt" maxlength="500"
                      placeholder="Ringkasan singkat yang muncul di card blog (max 500 karakter)"
                      oninput="updateCounter('excerpt', 'excerptCounter', 500)">{{ old('excerpt') }}</textarea>
            <div class="char-counter" id="excerptCounter">0 / 500</div>
            @error('excerpt')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="content">Isi Artikel <span class="required">*</span></label>
            <textarea id="content" name="content" required
                      placeholder="Tulis isi artikel lengkap di sini...">{{ old('content') }}</textarea>
            <div class="form-hint">Boleh pakai paragraf biasa (baris baru otomatis jadi ganti paragraf)</div>
            @error('content')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar Sampul</label>
            <input type="file" id="image" name="image" accept="image/*">
            <div class="form-hint">JPG, PNG · Maks 2MB · Muncul di card blog & bagian atas artikel</div>
            @error('image')<div class="form-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <div class="checkbox-wrap">
                <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label for="is_published">✓ Publikasikan sekarang (kalau tidak dicentang, disimpan sebagai draft)</label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save"></i> Simpan Artikel
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