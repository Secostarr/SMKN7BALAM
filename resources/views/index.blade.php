<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 7 Bandar Lampung</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<nav>
    <div class="container nav-container">
        <div class="logo">
            SMKN 7 Bandar Lampung
        </div>

        <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#jurusan">Jurusan</a></li>
            <li><a href="#fasilitas">Fasilitas</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
    </div>
</nav>

<section id="hero">

    <div class="hero-content">
        <h1>SMK Negeri 7 Bandar Lampung</h1>

        <p>
            Unggul dalam Prestasi, Siap Kerja, Kreatif dan Berkarakter.
        </p>

        <button id="btnDaftar">
            Daftar Sekarang
        </button>

    </div>

</section>

<section id="tentang">

    <h2>Tentang Sekolah</h2>

    <p class="section-text">
        SMK Negeri 7 Bandar Lampung merupakan sekolah kejuruan yang
        berkomitmen menghasilkan lulusan berkualitas,
        berkarakter dan siap bersaing di dunia kerja maupun dunia usaha.
    </p>

    <div class="stats">

        <div class="stat-box">
            <h3>1500+</h3>
            <p>Siswa</p>
        </div>

        <div class="stat-box">
            <h3>100+</h3>
            <p>Guru</p>
        </div>

        <div class="stat-box">
            <h3>9</h3>
            <p>Program Keahlian</p>
        </div>

        <div class="stat-box">
            <h3>A</h3>
            <p>Akreditasi</p>
        </div>

    </div>

</section>

<section id="jurusan">

    <h2>Program Keahlian</h2>

    <div class="card-grid">

        <div class="card">
            <i class="fas fa-network-wired"></i>
            <h3>TKJ</h3>
            <p>Teknik Komputer dan Jaringan</p>
        </div>

        <div class="card">
            <i class="fas fa-code"></i>
            <h3>RPL</h3>
            <p>Rekayasa Perangkat Lunak</p>
        </div>

        <div class="card">
            <i class="fas fa-palette"></i>
            <h3>DKV</h3>
            <p>Desain Komunikasi Visual</p>
        </div>

        <div class="card">
            <i class="fas fa-calculator"></i>
            <h3>AKL</h3>
            <p>Akuntansi & Keuangan</p>
        </div>

        <div class="card">
            <i class="fas fa-store"></i>
            <h3>BDP</h3>
            <p>Bisnis Daring & Pemasaran</p>
        </div>

        <div class="card">
            <i class="fas fa-user-nurse"></i>
            <h3>Keperawatan</h3>
            <p>Asisten Keperawatan</p>
        </div>

    </div>

</section>

<section id="fasilitas">

    <h2>Fasilitas Sekolah</h2>

    <div class="card-grid">

        <div class="card">
            <i class="fas fa-desktop"></i>
            <h3>Lab Komputer</h3>
        </div>

        <div class="card">
            <i class="fas fa-book"></i>
            <h3>Perpustakaan</h3>
        </div>

        <div class="card">
            <i class="fas fa-wifi"></i>
            <h3>Internet Sekolah</h3>
        </div>

        <div class="card">
            <i class="fas fa-school"></i>
            <h3>Ruang Praktik</h3>
        </div>

    </div>

</section>

<section id="testimoni">

    <h2>Testimoni Alumni</h2>

    <blockquote>
        "SMKN 7 Bandar Lampung memberikan pengalaman belajar
        yang sangat membantu saya ketika memasuki dunia kerja."

        <strong>- Alumni SMKN 7</strong>
    </blockquote>

</section>

<section id="kontak">

    <h2>Hubungi Kami</h2>

    <p>
        <i class="fas fa-location-dot"></i>
        Bandar Lampung
    </p>

    <p>
        <i class="fas fa-envelope"></i>
        info@smkn7.sch.id
    </p>

    <p>
        <i class="fas fa-phone"></i>
        (0721) XXXXXXX
    </p>

</section>

<footer>
    <p>
        © 2026 SMKN 7 Bandar Lampung
    </p>
</footer>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>