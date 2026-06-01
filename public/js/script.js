document.addEventListener('DOMContentLoaded', () => {

    const btnDaftar = document.getElementById('btnDaftar');

    btnDaftar.addEventListener('click', () => {

        alert(
            'Terima kasih telah tertarik bergabung dengan SMKN 7 Bandar Lampung. Halaman pendaftaran akan segera tersedia.'
        );

    });

    const links = document.querySelectorAll('nav a');

    links.forEach(link => {

        link.addEventListener('click', function(e){

            e.preventDefault();

            const target = document.querySelector(
                this.getAttribute('href')
            );

            target.scrollIntoView({
                behavior:'smooth'
            });

        });

    });

});