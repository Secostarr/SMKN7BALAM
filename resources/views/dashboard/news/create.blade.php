@extends('dashboard.layouts.app')

@section('title', 'Buat Berita Baru')
@section('page_title', 'Buat Berita Baru')

@section('content')
<style>
    
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
