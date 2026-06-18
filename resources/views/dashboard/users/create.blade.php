<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat User Baru - Dashboard</title>
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
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Buat User Baru</h1>
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

                <form action="{{ route('dashboard.users.store') }}" method="POST" style="margin-top: 1.5rem;">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input" placeholder="Masukkan nama..." required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="admin@smkn7.sch.id" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-input" style="cursor: pointer; background-color: #fff;">
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                        </select>
                    </div>
                    
                    <div style="margin-top: 2rem;">
                        <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 1.05rem;">Simpan User</button>
                    </div>
                </form>

            </main>
        </div>
    </div>

</body>
</html>