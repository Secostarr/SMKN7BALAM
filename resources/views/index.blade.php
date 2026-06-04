<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 7 Bandar Lampung</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<nav class="bg-yellow-500 text-gray-900 shadow-md fixed w-full z-10 top-0">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold">
            SMKN 7 Bandar Lampung
        </div>

        <ul class="hidden md:flex space-x-6">
            <li><a href="#hero" class="hover:text-yellow-700 transition">Beranda</a></li>
            <li><a href="#tentang" class="hover:text-yellow-700 transition">Tentang</a></li>
            <li><a href="#jurusan" class="hover:text-yellow-700 transition">Jurusan</a></li>
            <li><a href="#fasilitas" class="hover:text-yellow-700 transition">Fasilitas</a></li>
            <li><a href="#kontak" class="hover:text-yellow-700 transition">Kontak</a></li>
        </ul>
    </div>
</nav>

<section id="hero" class="pt-32 pb-20 bg-yellow-100 text-center">

    <div class="container mx-auto px-6">
        <h1 class="text-4xl md:text-5xl font-extrabold text-yellow-900 mb-6">SMK Negeri 7 Bandar Lampung</h1>

        <p class="text-lg md:text-xl text-gray-700 mb-10">
            Unggul dalam Prestasi, Siap Kerja, Kreatif dan Berkarakter.
        </p>

        <button id="btnDaftar" class="bg-yellow-500 text-gray-900 px-8 py-3 rounded-full font-bold hover:bg-yellow-600 transition shadow-lg">
            Daftar Sekarang
        </button>

    </div>

</section>

<section id="tentang" class="py-20 bg-white">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-8 text-yellow-800">Tentang Sekolah</h2>

        <p class="text-gray-600 max-w-2xl mx-auto mb-12 text-lg">
            SMK Negeri 7 Bandar Lampung merupakan sekolah kejuruan yang
            berkomitmen menghasilkan lulusan berkualitas,
            berkarakter dan siap bersaing di dunia kerja maupun dunia usaha.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

            <div class="bg-yellow-50 p-6 rounded-lg shadow-sm">
                <h3 class="text-4xl font-bold text-yellow-600 mb-2">1500+</h3>
                <p class="text-gray-700 font-medium">Siswa</p>
            </div>

            <div class="bg-yellow-50 p-6 rounded-lg shadow-sm">
                <h3 class="text-4xl font-bold text-yellow-600 mb-2">100+</h3>
                <p class="text-gray-700 font-medium">Guru</p>
            </div>

            <div class="bg-yellow-50 p-6 rounded-lg shadow-sm">
                <h3 class="text-4xl font-bold text-yellow-600 mb-2">9</h3>
                <p class="text-gray-700 font-medium">Program Keahlian</p>
            </div>

            <div class="bg-yellow-50 p-6 rounded-lg shadow-sm">
                <h3 class="text-4xl font-bold text-yellow-600 mb-2">A</h3>
                <p class="text-gray-700 font-medium">Akreditasi</p>
            </div>

        </div>

    </div>

</section>

<section id="jurusan" class="py-20 bg-gray-50">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-yellow-800">Program Keahlian</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-network-wired text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">TKJ</h3>
                <p class="text-gray-600">Teknik Komputer dan Jaringan</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-code text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">RPL</h3>
                <p class="text-gray-600">Rekayasa Perangkat Lunak</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-palette text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">DKV</h3>
                <p class="text-gray-600">Desain Komunikasi Visual</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-calculator text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">AKL</h3>
                <p class="text-gray-600">Akuntansi & Keuangan</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-store text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">BDP</h3>
                <p class="text-gray-600">Bisnis Daring & Pemasaran</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition">
                <i class="fas fa-user-nurse text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Keperawatan</h3>
                <p class="text-gray-600">Asisten Keperawatan</p>
            </div>

        </div>
    </div>
 
</section>

<section id="fasilitas" class="py-20 bg-white">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-12 text-yellow-800">Fasilitas Sekolah</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

            <div class="p-6">
                <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-desktop text-3xl text-yellow-600"></i>
                </div>
                <h3 class="font-bold text-lg">Lab Komputer</h3>
            </div>

            <div class="p-6">
                <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-book text-3xl text-yellow-600"></i>
                </div>
                <h3 class="font-bold text-lg">Perpustakaan</h3>
            </div>

            <div class="p-6">
                <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-wifi text-3xl text-yellow-600"></i>
                </div>
                <h3 class="font-bold text-lg">Internet Sekolah</h3>
            </div>

            <div class="p-6">
                <div class="bg-yellow-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-school text-3xl text-yellow-600"></i>
                </div>
                <h3 class="font-bold text-lg">Ruang Praktik</h3>
            </div>

        </div>
    </div>

</section>

<section id="testimoni" class="py-20 bg-yellow-500 text-gray-900 text-center">

    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10">Testimoni Alumni</h2>

        <blockquote class="text-xl md:text-2xl italic max-w-3xl mx-auto mb-6">
            "SMKN 7 Bandar Lampung memberikan pengalaman belajar
            yang sangat membantu saya ketika memasuki dunia kerja."
        </blockquote>
        
        <strong class="text-lg">- Alumni SMKN 7</strong>
    </div>

</section>

<section id="kontak" class="py-20 bg-gray-50">

    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-10 text-yellow-800">Hubungi Kami</h2>

        <div class="flex flex-col md:flex-row justify-center items-center space-y-6 md:space-y-0 md:space-x-12">
            <div class="flex items-center text-lg text-gray-700">
                <i class="fas fa-location-dot text-yellow-500 mr-3 text-2xl"></i>
                Bandar Lampung
            </div>

            <div class="flex items-center text-lg text-gray-700">
                <i class="fas fa-envelope text-yellow-500 mr-3 text-2xl"></i>
                info@smkn7.sch.id
            </div>

            <div class="flex items-center text-lg text-gray-700">
                <i class="fas fa-phone text-yellow-500 mr-3 text-2xl"></i>
                (0721) XXXXXXX
            </div>
        </div>
    </div>

</section>

<footer class="bg-gray-800 text-gray-400 py-8 text-center">
    <p>
        © 2026 SMKN 7 Bandar Lampung
    </p>
</footer>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>