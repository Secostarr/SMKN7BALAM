@extends('dashboard.layouts.app')

@section('title', 'Edit Testimoni')
@section('page_title', 'Edit Testimoni')

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
    <form action="{{ route('dashboard.testimonials.update', $testimonial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">👤 Nama Alumni</label>
            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-input" placeholder="Contoh: Budi Santoso" required>
            <div class="form-hint">Nama lengkap alumni yang memberikan testimoni</div>
        </div>

        <div class="form-group">
            <label class="form-label">📚 Angkatan & Jurusan (Opsional)</label>
            <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="form-input" placeholder="Contoh: Alumni 2023, IPA">
            <div class="form-hint">Tahun lulus dan jurusan saat di sekolah</div>
        </div>

        <div class="form-group">
            <label class="form-label">⭐ Isi Testimoni</label>
            <textarea name="content" class="form-textarea" placeholder="Tulis pengalaman berkesan, cerita sukses, atau pesan untuk siswa lainnya..." required>{{ old('content', $testimonial->content) }}</textarea>
            <div class="form-hint">Tuliskan testimoni yang inspiratif dan autentik dari pengalaman alumni</div>
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.testimonials.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Perbarui Testimoni</button>
        </div>
    </form>
</div>
@endsection
