<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}?v={{ time() }}">
</head>
<body class="dashboard-page">

    <nav>
        <div class="container nav-container">
            <a href="/" class="logo">SMKN 7 Bandar Lampung</a>
            <ul>
                <li><a href="/" style="color: var(--dark);">Lihat Website</a></li>
                <li>
                    <form action="/logout" method="POST" style="display:inline; margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="dashboard-wrapper">
        <div class="dashboard-layout container">
            
            <main class="dashboard-main panel" style="max-width: 600px; margin: 0 auto; width: 100%;">
                
                <div class="header-action">
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Edit Data User</h1>
                    <a href="{{ route('dashboard.users.index') }}" class="btn-outline">Kembali</a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-left: 1.5rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.users.update', $user) }}" method="POST" style="margin-top: 1.5rem;">
                    @csrf
                    @method('PUT') <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-input" placeholder="Isi jika ingin ganti">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password baru">
                        </div>
                    </div>
                    <p style="font-size: 0.85rem; color: #6b7280; margin-top: -1rem; margin-bottom: 1.5rem;">
                        *Biarkan kolom password kosong jika tidak ingin mengubah password.
                    </p>

                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-input" style="cursor: pointer; background-color: #fff;">
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    
                    <div style="margin-top: 2rem;">
                        <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 1.05rem;">Perbarui Data User</button>
                    </div>
                </form>

            </main>
        </div>
    </div>

</body>
</html>