document.addEventListener('DOMContentLoaded', () => {

    const btnDaftar = document.getElementById('btnDaftar');

    if (btnDaftar) {
        btnDaftar.addEventListener('click', (e) => {

            // ripple effect
            createRipple(e, btnDaftar);

            alert(
                'Terima kasih telah tertarik bergabung dengan SMKN 7 Bandar Lampung. Halaman pendaftaran akan segera tersedia.'
            );

        });
    }

    const links = document.querySelectorAll('nav a');

    links.forEach(link => {

        link.addEventListener('click', function(e){

            const href = this.getAttribute('href');
            if (!href || !href.startsWith('#')) return;

            const target = document.querySelector(href);

            if (!target) return;

            e.preventDefault();

            target.scrollIntoView({
                behavior:'smooth'
            });

        });

    });

    /* ===== Animations: reveal on scroll & subtle pulse ===== */

    // Intersection Observer to reveal elements with CSS animations defined in public/css/style.css
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                // set animation delay from dataset if present
                if (el.dataset && el.dataset.delay) el.style.animationDelay = el.dataset.delay;

                // choose animation class based on element type
                if (el.classList.contains('card') || el.classList.contains('stat-box') || el.classList.contains('contact-item')) {
                    el.classList.add('animate-fadeInUp');
                    el.classList.add('animate-reveal');
                    // if stat-box, animate its number
                    const num = el.querySelector('h3');
                    if (num) animateNumber(num);
                } else if (el.tagName === 'BLOCKQUOTE') {
                    el.classList.add('animate-fadeInUp');
                } else if (el.id === 'btnDaftar'){
                    el.classList.add('animate-fadeInUp');
                } else {
                    el.classList.add('animate-fadeIn');
                }

                // ensure element visible (CSS animations will run)
                el.style.opacity = 1;
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.15 });

    // Select elements to animate and set incremental delays for nicer stagger
    const revealSelectors = ['.hero-content h1', '.hero-content p', '#btnDaftar', '.stat-box', '.card', '.contact-item', 'blockquote'];
    const nodes = document.querySelectorAll(revealSelectors.join(', '));

    nodes.forEach((el, i) => {
        el.style.opacity = 0;
        // small stagger
        el.dataset.delay = `${i * 120}ms`;
        observer.observe(el);
    });

    // subtle continuous pulse for CTA
    try {
        const btn = document.getElementById('btnDaftar');
        if (btn) btn.classList.add('animate-pulse');
    } catch (e) {
        // ignore
    }

    /* ===== Parallax-like subtle movement for hero content ===== */
    const heroContent = document.querySelector('.hero-content');
    window.addEventListener('scroll', () => {
        const sc = window.scrollY;
        if (heroContent) heroContent.style.transform = `translateY(${sc * 0.03}px)`;
    });

    /* ===== helper: number counter for .stat-box h3 ===== */
    function animateNumber(el){
        const text = el.textContent.trim();
        const numeric = parseInt(text.replace(/[^0-9]/g, ''), 10);
        if (isNaN(numeric)) return; // skip if not numeric

        const duration = 1200;
        const start = 0;
        const startTime = performance.now();

        function tick(now){
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = Math.floor(progress * (numeric - start) + start);
            // preserve suffix like +
            const suffix = text.replace(/[0-9]/g,'');
            el.textContent = `${value}${suffix}`;
            if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    /* ===== helper: ripple effect */
    function createRipple(e, container){
        const rect = container.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        const size = Math.max(rect.width, rect.height);
        ripple.style.width = ripple.style.height = size + 'px';
        const x = e.clientX - rect.left - size/2;
        const y = e.clientY - rect.top - size/2;
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        container.appendChild(ripple);
        setTimeout(()=> ripple.remove(), 800);
    }

    /* ===== small accessibility: pause animations if user prefers reduced motion ===== */
    const mq = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (mq && mq.matches){
        document.querySelectorAll('.animate-fadeInUp, .animate-fadeIn, .animate-pulse, .animate-floaty').forEach(n=>{
            n.style.animation = 'none';
            n.style.opacity = 1;
            n.style.transform = 'none';
        });
    }

    /* ===== Scroll progress, slide-in and parallax enhancements ===== */
    if (!mq || !mq.matches){
        // progress bar
        const progressContainer = document.createElement('div');
        progressContainer.className = 'progress-container';
        const progressBar = document.createElement('div');
        progressBar.className = 'progress-bar';
        progressContainer.appendChild(progressBar);
        document.body.appendChild(progressContainer);

        function updateProgress(){
            const scrollTop = window.scrollY || window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight;
            const winH = window.innerHeight;
            const pct = Math.min(100, Math.max(0, (scrollTop / (docHeight - winH)) * 100));
            progressBar.style.width = pct + '%';
        }

        window.addEventListener('scroll', updateProgress, { passive: true });
        updateProgress();

        // slide-in observer for sections
        const slideObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting){
                    const el = entry.target;
                    // direction: data-direction || alternate left/right
                    const sections = Array.from(document.querySelectorAll('section'));
                    const idx = sections.indexOf(el);
                    const dir = el.dataset.direction || (idx % 2 === 0 ? 'left' : 'right');
                    if (dir === 'left') el.classList.add('slide-in-left'); else el.classList.add('slide-in-right');
                    el.classList.add('scroll-revealed');
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.18 });

        document.querySelectorAll('section').forEach(s => {
            // avoid animating hero which already has animations
            if (s.id === 'hero') return;
            s.classList.add('scroll-fade');
            slideObserver.observe(s);
        });

        // parallax for elements with data-parallax
        const parallaxEls = document.querySelectorAll('[data-parallax]');
        function updateParallax(){
            parallaxEls.forEach(el => {
                const speed = parseFloat(el.dataset.parallax) || 0.25;
                const rect = el.getBoundingClientRect();
                const center = rect.top + rect.height / 2;
                const winCenter = window.innerHeight / 2;
                const delta = (center - winCenter) * -1; // invert to move opposite
                el.style.transform = `translateY(${delta * speed * 0.05}px)`;
            });
        }
        window.addEventListener('scroll', updateParallax, { passive: true });
        updateParallax();
    }

});
