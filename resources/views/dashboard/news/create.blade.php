@extends('dashboard.layouts.app')

@section('title', 'Buat Berita Baru')
@section('page_title', 'Buat Berita Baru')

@section('content')
<style>
    .form-container {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        max-width: 900px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: inherit;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: #ECB65F;
        box-shadow: 0 0 0 3px rgba(236, 182, 95, 0.1);
    }

    .form-textarea {
        min-height: 200px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #f0f0f0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ECB65F, #d4a657);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(236, 182, 95, 0.4);
    }

    .btn-outline {
        background: white;
        color: #ECB65F;
        padding: 0.75rem 2rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid #ECB65F;
        cursor: pointer;
    }

    .btn-outline:hover {
        background: #ECB65F;
        color: white;
    }

    .alert {
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        border-left: 4px solid;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .alert li {
        margin: 0.25rem 0;
    }

    .image-preview {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .image-preview img {
        max-width: 300px;
        max-height: 200px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .file-input-label {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        color: #ECB65F;
    }

    .file-input-label:hover {
        background: #fff;
        border-color: #ECB65F;
    }

    input[type="file"] {
        display: none;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }
    }
</style>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>⚠️ Ada kesalahan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">📝 Judul Berita</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-input" placeholder="Masukkan judul berita..." required>
        </div>

        <div class="form-group">
            <label class="form-label">📄 Isi Berita</label>
            <textarea name="content" class="form-textarea" placeholder="Ketik isi berita atau pengumuman..." required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">🖼️ Gambar (Opsional)</label>
            <label class="file-input-label">
                Pilih Gambar
                <input type="file" name="image" accept="image/*" id="imageInput">
            </label>
            <div id="imagePreview" class="image-preview"></div>
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.news.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Simpan Berita</button>
        </div>
    </form>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
@endsection
