<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Testimoni - Dashboard</title>
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
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Tambah Testimoni</h1>
                    <a href="{{ route('dashboard.testimonials.index') }}" class="btn-outline">Kembali</a>
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

                <form action="{{ route('dashboard.testimonials.store') }}" method="POST" style="margin-top: 1.5rem;">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Nama Alumni</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Peran / Angkatan (Opsional)</label>
                        <input type="text" name="role" value="{{ old('role') }}" class="form-input" placeholder="Contoh: Alumni 2023 atau UI/UX Designer">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Isi Testimoni</label>
                        <textarea name="content" class="form-textarea" placeholder="Tulis pengalaman berkesan selama di sekolah..." required style="min-height: 120px;">{{ old('content') }}</textarea>
                    </div>
                    
                    <div style="margin-top: 2rem;">
                        <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 1.05rem;">Simpan Testimoni</button>
                    </div>
                </form>

            </main>
        </div>
    </div>

</body>
</html>