@extends('dashboard.layouts.app')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')

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
    <form action="{{ route('dashboard.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">📝 Judul Berita</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-input" placeholder="Masukkan judul berita..." required>
        </div>

        <div class="form-group">
            <label class="form-label">📄 Isi Berita</label>
            <textarea name="content" class="form-textarea" placeholder="Ketik isi berita atau pengumuman..." required>{{ old('content', $news->content) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">🖼️ Gambar (Opsional)</label>
            @if($news->image)
                <div class="image-preview">
                    <p style="font-size: 0.9rem; color: #7f8c8d; margin-bottom: 0.5rem;">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Current image">
                </div>
            @endif
            <label class="file-input-label">
                Pilih Gambar Baru
                <input type="file" name="image" accept="image/*" id="imageInput">
            </label>
            <div id="imagePreview" class="image-preview"></div>
        </div>

        <div class="form-group">
            <label class="form-label">📅 Tanggal Terbit (Opsional)</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('Y-m-d\TH:i') : '') }}" class="form-input">
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.news.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Perbarui Berita</button>
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
                imagePreview.innerHTML = `<p style="font-size: 0.9rem; color: #7f8c8d; margin-bottom: 0.5rem;">Gambar baru:</p><img src="${e.target.result}" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
@endsection
