@extends('dashboard.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Admin')

@section('content')
<style>
    .welcome-banner {
        background: linear-gradient(135deg, #ECB65F 0%, #d4a657 100%);
        border-radius: 12px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .welcome-banner h1 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .welcome-banner p {
        font-size: 1rem;
        opacity: 0.95;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 4px solid #ECB65F;
    }

    .stat-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .stat-card-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
    }

    .stat-card-title {
        font-size: 0.9rem;
        color: #7f8c8d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .stat-card-icon {
        font-size: 1.8rem;
    }

    .stat-card-value {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .stat-card-desc {
        font-size: 0.85rem;
        color: #95a5a6;
    }

    .action-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
        cursor: pointer;
    }

    .action-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        transform: translateY(-4px);
    }

    .action-card-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .action-card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .action-card-desc {
        font-size: 0.9rem;
        color: #7f8c8d;
        margin-bottom: 1.5rem;
    }

    .btn-action {
        display: inline-block;
        background: linear-gradient(135deg, #ECB65F, #d4a657);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-action:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(236, 182, 95, 0.4);
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 2rem 0 1.5rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #ECB65F;
        display: inline-block;
    }

    @media (max-width: 768px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .welcome-banner h1 {
            font-size: 1.4rem;
        }
    }
</style>

<!-- Welcome Banner -->
<div class="welcome-banner">
    <h1>👋 Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p>Kelola konten, berita, dan pengguna website SMKN 7 Bandar Lampung dari sini.</p>
</div>

<!-- Quick Stats -->
<div class="dashboard-grid">
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Berita</div>
                <div class="stat-card-value">{{ \App\Models\News::count() }}</div>
            </div>
            <div class="stat-card-icon">📰</div>
        </div>
        <div class="stat-card-desc">Berita yang telah dipublikasikan</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Users</div>
                <div class="stat-card-value">{{ \App\Models\User::count() }}</div>
            </div>
            <div class="stat-card-icon">👥</div>
        </div>
        <div class="stat-card-desc">Admin dan pengguna sistem</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Testimoni</div>
                <div class="stat-card-value">{{ \App\Models\Testimonial::count() }}</div>
            </div>
            <div class="stat-card-icon">⭐</div>
        </div>
        <div class="stat-card-desc">Testimoni dari alumni</div>
    </div>
</div>

<!-- Management Section -->
<h3 class="section-title">🔧 Kelola Konten</h3>
<div class="dashboard-grid">
    <div class="action-card">
        <div class="action-card-icon">📰</div>
        <div class="action-card-title">Kelola Berita</div>
        <div class="action-card-desc">Tambah, edit, dan hapus berita atau pengumuman sekolah.</div>
        <a href="{{ route('dashboard.news.index') }}" class="btn-action">Buka Menu →</a>
    </div>

    <div class="action-card">
        <div class="action-card-icon">👥</div>
        <div class="action-card-title">Kelola Users</div>
        <div class="action-card-desc">Manajemen admin dan pengguna website SMKN 7.</div>
        <a href="{{ route('dashboard.users.index') }}" class="btn-action">Buka Menu →</a>
    </div>

    <div class="action-card">
        <div class="action-card-icon">⭐</div>
        <div class="action-card-title">Kelola Testimoni</div>
        <div class="action-card-desc">Tambah, edit, dan hapus testimoni dari alumni.</div>
        <a href="{{ route('dashboard.testimonials.index') }}" class="btn-action">Buka Menu →</a>
    </div>
</div>
@endsection
