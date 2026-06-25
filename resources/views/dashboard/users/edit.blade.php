@extends('dashboard.layouts.app')

@section('title', 'Edit User')
@section('page_title', 'Edit User')

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
    <div class="user-info">
        <div class="user-info-item">
            <span class="user-info-label">ID User:</span>
            <span class="user-info-value">#{{ $user->id }}</span>
        </div>
        <div class="user-info-item">
            <span class="user-info-label">Dibuat:</span>
            <span class="user-info-value">{{ $user->created_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">👤 Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">📧 Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">🔐 Password Baru</label>
                <input type="password" name="password" class="form-input" placeholder="Isi jika ingin ganti">
                <div class="password-info">* Biarkan kosong jika tidak ingin mengubah</div>
            </div>
            <div class="form-group">
                <label class="form-label">✓ Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password baru">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">🎭 Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.users.index') }}" class="btn-outline">← Batal</a>
            <button type="submit" class="btn-primary">✅ Perbarui User</button>
        </div>
    </form>
</div>
@endsection
