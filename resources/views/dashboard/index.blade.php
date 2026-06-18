<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SMKN7</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="p-6">
    <nav class="bg-primary mb-6 rounded" style="padding:12px 18px; box-shadow:var(--shadow-md);">
        <div class="container nav-container">
            <a href="{{ route('index') }}" class="logo">SMKN 7 Bandar Lampung</a>
            <div>
                <form action="{{ route('dashboard.logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="dashboard-wrapper">
    <div class="dashboard-layout container">

        <main class="dashboard-main">
            
            <div style="background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%); border-radius: 12px; padding: 2.5rem; margin-bottom: 2.5rem; box-shadow: var(--shadow-md);">
                <h1 style="color: var(--dark); font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem;">Selamat Datang di Dashboard</h1>
                <p style="color: #333; font-size: 1.1rem;">Kelola konten situs, berita, dan pengumuman sekolah dari sini.</p>
            </div>

            <h2 style="margin-bottom: 1.5rem; color: var(--dark); font-size: 1.5rem; text-align: left;">Akses Cepat</h2>
            
            <div class="dashboard-cards-grid">
                
                <div class="dash-card">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">📰 Kelola Berita</h3>
                    <p style="margin-bottom: 1.5rem;">Tambah, edit, dan hapus berita atau pengumuman.</p>
                    <a href="{{ route('dashboard.news.index') }}" class="btn-primary" style="display: block; text-align: center;">Buka Menu</a>
                </div>

                <div class="dash-card">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">👥 Kelola User</h3>
                    <p style="margin-bottom: 1.5rem;">Manajemen admin dan pengguna website.</p>
                    <a href="{{ route('dashboard.users.index') }}" class="btn-primary" style="display: block; text-align: center;">Buka Menu</a>
                </div>

                <div class="dash-card">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">👥 Kelola Testimoni</h3>
                    <p style="margin-bottom: 1.5rem;">Tambah, Edit, dan Hapus Testimoni Dari Alumni</p>
                    <a href="{{ route('dashboard.testimonials.index') }}" class="btn-primary" style="display: block; text-align: center;">Buka Menu</a>
                </div>
            </div>
        </main>

    </div>
</div>


</body>
</html>
