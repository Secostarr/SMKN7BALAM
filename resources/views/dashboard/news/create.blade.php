<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Berita - Dashboard</title>
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
            
            <main class="dashboard-main panel">
                
                <div class="header-action">
                    <h1 style="color: var(--dark); font-size: 1.8rem; font-weight: 800;">Buat Berita Baru</h1>
                    <a href="{{ route('dashboard.news.index') }}" class="btn-outline">Kembali</a>
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

                <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: 1.5rem;">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-input" placeholder="Masukkan judul..." required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="content" class="form-textarea" placeholder="Ketik isi berita atau pengumuman di sini..." required>{{ old('content') }}</textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Gambar (Opsional)</label>
                            <input type="file" name="image" accept="image/*" class="form-input" style="padding: 7px 12px;">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Terbit (Opsional)</label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="form-input">
                        </div>
                    </div>

                    <div style="margin-top: 1.5rem;">
                        <button type="submit" class="btn-primary" style="padding: 12px 24px; font-size: 1rem;">Simpan Berita</button>
                    </div>
                </form>

            </main>
        </div>
    </div>

</body>
</html>