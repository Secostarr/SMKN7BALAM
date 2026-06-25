@extends('dashboard.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Admin')

@section('content')
<style>

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
