<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 7 Bandar Lampung</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<nav class="bg-primary text-gray-900 shadow-md fixed w-full z-10 top-0" id="navbar">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold">
            SMKN 7 Bandar Lampung
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-900 focus:outline-none" id="mobileMenuBtn">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6">
            <li><a href="#hero" class="hover:text-accent transition">Beranda</a></li>
            <li><a href="#tentang" class="hover:text-accent transition">Tentang</a></li>
            <li><a href="#jurusan" class="hover:text-accent transition">Jurusan</a></li>
            <li><a href="#ekstrakurikuler" class="hover:text-accent transition">Ekstrakurikuler</a></li>
            <li><a href="#fasilitas" class="hover:text-accent transition">Fasilitas</a></li>
            <li><a href="#kontak" class="hover:text-accent transition">Kontak</a></li>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-primary border-t border-gray-200" id="mobileMenu">
        <ul class="flex flex-col space-y-4 px-6 py-4">
            <li><a href="#hero" class="block hover:text-accent transition py-2">Beranda</a></li>
            <li><a href="#tentang" class="block hover:text-accent transition py-2">Tentang</a></li>
            <li><a href="#jurusan" class="block hover:text-accent transition py-2">Jurusan</a></li>
            <li><a href="#ekstrakurikuler" class="block hover:text-accent transition py-2">Ekstrakurikuler</a></li>
            <li><a href="#fasilitas" class="block hover:text-accent transition py-2">Fasilitas</a></li>
            <li><a href="#kontak" class="block hover:text-accent transition py-2">Kontak</a></li>
        </ul>
    </div>
</nav>

<section id="hero" class="pt-32 pb-20 text-center">

    <div class="container mx-auto px-6 hero-content">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">SMK Negeri 7 Bandar Lampung</h1>

        <p class="text-lg md:text-xl text-gray-700 mb-10">
            Unggul dalam Prestasi, Siap Kerja, Kreatif dan Berkarakter.
        </p>

        <button id="btnDaftar" class="bg-primary text-gray-900 px-8 py-3 rounded-full font-bold hover:bg-accent transition shadow-lg">
            Daftar Sekarang
        </button>

    </div>

</section>

<section id="tentang" class="py-20 bg-white">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-8 text-primary">Tentang Sekolah</h2>

        <p class="text-gray-600 max-w-2xl mx-auto mb-12 text-lg">
            SMK Negeri 7 Bandar Lampung merupakan sekolah kejuruan negeri yang berlokasi di Jalan Pendidikan, Sukarame Baru, Kecamatan Sukarame, Kota Bandar Lampung. Sekolah ini memiliki NPSN 69765023 dan telah diakreditasi A berdasarkan SK No. 032/BAN-SM/SK/2019 tertanggal 15 Januari 2019. Kami berkomitmen menghasilkan lulusan berkualitas, berkarakter dan siap bersaing di dunia kerja maupun dunia usaha.
        </p>

        <div class="stats">

            <div class="stat-box">
                <h3>958</h3>
                <p class="text-gray-700 font-medium">Siswa</p>
            </div>

            <div class="stat-box">
                <h3>50+</h3>
                <p class="text-gray-700 font-medium">Guru</p>
            </div>

            <div class="stat-box">
                <h3>9</h3>
                <p class="text-gray-700 font-medium">Program Keahlian</p>
            </div>

            <div class="stat-box">
                <h3>A</h3>
                <p class="text-gray-700 font-medium">Akreditasi</p>
            </div>

        </div>

    </div>

</section>

<section id="jurusan" class="py-20 bg-gray-50">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-primary">Program Keahlian</h2>

        <div class="card-grid">

            <div class="card">
                <i class="fas fa-car text-4xl text-primary mb-4"></i>
                <h3>TKRO</h3>
                <p>Teknik Kendaraan Ringan Otomotif</p>
            </div>

            <div class="card">
                <i class="fas fa-motorcycle text-4xl text-primary mb-4"></i>
                <h3>TBSM</h3>
                <p>Teknik dan Bisnis Sepeda Motor</p>
            </div>

            <div class="card">
                <i class="fas fa-network-wired text-4xl text-primary mb-4"></i>
                <h3>TKJ</h3>
                <p>Teknik Komputer Jaringan</p>
            </div>

            <div class="card">
                <i class="fas fa-laptop-code text-4xl text-primary mb-4"></i>
                <h3>PPLG</h3>
                <p>Pengembangan Perangkat Lunak dan Gim</p>
            </div>

            <div class="card">
                <i class="fas fa-palette text-4xl text-primary mb-4"></i>
                <h3>DKV</h3>
                <p>Desain Komunikasi Visual (MM)</p>
            </div>

            <div class="card">
                <i class="fas fa-user-nurse text-4xl text-primary mb-4"></i>
                <h3>Asisten Keperawatan</h3>
                <p>Asisten Keperawatan</p>
            </div>

            <div class="card">
                <i class="fas fa-pills text-4xl text-primary mb-4"></i>
                <h3>FKK</h3>
                <p>Farmasi Klinis dan Komunitas</p>
            </div>

            <div class="card">
                <i class="fas fa-calculator text-4xl text-primary mb-4"></i>
                <h3>AKL</h3>
                <p>Akuntansi dan Keuangan Lembaga</p>
            </div>

            <div class="card">
                <i class="fas fa-bullhorn text-4xl text-primary mb-4"></i>
                <h3>Pemasaran</h3>
                <p>Pemasaran</p>
            </div>

        </div>
    </div>
 
</section>

<section id="ekstrakurikuler" class="py-20 bg-gray-50">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-primary">Ekstrakurikuler</h2>

        <div class="stats">

            <div class="card">
                <i class="fas fa-hand-fist text-4xl text-primary mb-4"></i>
                <h3>Karate</h3>
                <p>Belajar disiplin dan self-defense</p>
            </div>

            <div class="card">
                <i class="fas fa-basketball text-4xl text-primary mb-4"></i>
                <h3>Basket</h3>
                <p>Olahraga tim dan kerjasama</p>
            </div>

            <div class="card">
                <i class="fas fa-futbol text-4xl text-primary mb-4"></i>
                <h3>Futsal</h3>
                <p>Olahraga populer dan kompetitif</p>
            </div>

            <div class="card">
                <i class="fas fa-users text-4xl text-primary mb-4"></i>
                <h3>Grup Belajar</h3>
                <p>Peningkatan akademik bersama</p>
            </div>

        </div>
    </div>

</section>

<section id="fasilitas" class="py-20 bg-white">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-primary">Fasilitas Sekolah</h2>

        <div class="stats">

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-desktop text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Lab Komputer</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-book text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Perpustakaan</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-wifi text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Internet Sekolah</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-school text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Ruang Praktik</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-car text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Bengkel Otomotif</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-flask text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Lab Farmasi</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heart-pulse text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Lab Keperawatan</h3>
            </div>

            <div class="card">
                <div class="bg-secondary w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-palette text-3xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg">Studio Desain</h3>
            </div>

        </div>
    </div>

</section>

<section id="testimoni" class="py-20 bg-primary text-gray-900 text-center">

    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10">Testimoni Alumni</h2>

        <blockquote>
            <p>"SMKN 7 Bandar Lampung memberikan pengalaman belajar
            yang sangat membantu saya ketika memasuki dunia kerja."</p>
        
            <strong>- Alumni SMKN 7</strong>
        </blockquote>
    </div>

</section>

<section id="kontak" class="py-20 bg-gray-50">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-10 text-primary">Hubungi Kami</h2>

        <div class="flex flex-col md:flex-row justify-center items-center flex-wrap gap-4">
            <div class="contact-item">
                <i class="fas fa-location-dot text-2xl"></i>
                <span>Jl. Pendidikan, Sukarame Baru, Bandar Lampung</span>
            </div>

            <div class="contact-item">
                <i class="fas fa-envelope text-2xl"></i>
                <span>smkn7bandarlampung@yahoo.co.id</span>
            </div>

            <div class="contact-item">
                <i class="fas fa-globe text-2xl"></i>
                <span>www.smkn7bandarlampung.sch.id</span>
            </div>

            <div class="contact-item">
                <i class="fas fa-fax text-2xl"></i>
                <span>(0721) 56010689</span>
            </div>
        </div>
    </div>

</section>

<footer class="bg-gray-800 text-gray-400 py-8 text-center">
    <p>
        © 2026 SMKN 7 Bandar Lampung
    </p>
</footer>

<script>
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking a link
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>