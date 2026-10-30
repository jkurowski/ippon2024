/* ==========================================================================
   IPPON — ruch na stronie glownej i podstronach (layouts/page)
   Bez bibliotek: jeden handler scrolla na rAF.

   [data-nh-reveal]    wejscie elementu przy pierwszym pojawieniu sie w oknie
                       (kolejnosc w grupie: style="--nh-i: 0..n")
   [data-nh-img]       odsloniecie zdjecia (maska + zejscie ze skali)
   [data-nh-parallax]  zdjecie przesuwa sie wolniej niz strona (tylko >= 992px)

   Stany poczatkowe siedza w CSS pod html.nh-motion — klase stawia widok tylko
   wtedy, gdy system nie prosi o ograniczenie ruchu. Bez JS nic sie nie chowa.
   ========================================================================== */
(function () {
    'use strict';

    var root = document.documentElement;
    var motion = root.classList.contains('nh-motion');

    /* --- Wejscia przy scrollu ------------------------------------------ */
    /* Bez IntersectionObservera: przy skoku (kotwica, odswiezenie w polowie
       strony) element przeskoczony w jednej klatce nigdy "nie przecinal" okna
       i zostawal niewidoczny. Tu wystarczy, ze jest powyzej 88% wysokosci okna
       — takze nad nim. Kazdy wchodzi raz, lista sie kurczy. */
    var pending = Array.prototype.slice.call(document.querySelectorAll('[data-nh-reveal], [data-nh-img]'));

    function reveal() {
        if (!pending.length) return;

        var line = window.innerHeight * 0.88;

        pending = pending.filter(function (el) {
            if (el.getBoundingClientRect().top < line) {
                el.classList.add('is-in');
                return false;
            }
            return true;
        });
    }

    if (!motion) {
        pending.forEach(function (el) { el.classList.add('is-in'); });
        pending = [];
    }

    /* --- Paralaksa + stan naglowka ---------------------------------------- */
    var header   = document.querySelector('.ip-header');
    var parallax = Array.prototype.slice.call(document.querySelectorAll('[data-nh-parallax]'));
    var desktop  = window.matchMedia('(min-width: 992px)');
    var ticking  = false;

    function update() {
        ticking = false;

        if (header) {
            header.classList.toggle('is-scrolled', window.pageYOffset > 40);
        }

        reveal();

        if (!motion || !desktop.matches) return;

        var vh = window.innerHeight;

        parallax.forEach(function (el) {
            var box  = el.parentNode.getBoundingClientRect();
            if (box.bottom < 0 || box.top > vh) return;

            /* -1 (element pod oknem) ... 1 (nad oknem); zakres ruchu to zapas
               wysokosci dany w CSS (.ip-nh-parallax: inset -8% 0) */
            var p = (vh / 2 - (box.top + box.height / 2)) / (vh / 2 + box.height / 2);
            var shift = Math.max(-1, Math.min(1, p)) * box.height * 0.07;

            el.style.transform = 'translate3d(0,' + shift.toFixed(1) + 'px,0)';
        });
    }

    function requestUpdate() {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(update);
    }

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate);
    window.addEventListener('load', requestUpdate);   // zdjecia zmieniaja wysokosci sekcji
    update();

    /* --- Hero: licznik slajdow i pasek postepu ---------------------------- */
    var hero = document.getElementById('ipHero');

    if (hero) {
        var current  = hero.querySelector('[data-nh-hero-current]');
        var progress = hero.querySelector('[data-nh-progress]');

        var restartProgress = function () {
            if (!progress) return;
            progress.classList.remove('is-running');
            void progress.offsetWidth;   // wymusza reflow, inaczej animacja nie startuje od zera
            progress.classList.add('is-running');
        };

        hero.addEventListener('slide.bs.carousel', function (event) {
            if (current) current.textContent = String(event.to + 1).padStart(2, '0');
            restartProgress();
        });

        restartProgress();
    }

    /* --- Film: plakat -> YouTube dopiero po kliknieciu -------------------- */
    document.querySelectorAll('.ip-nh .ip-video[data-video]').forEach(function (box) {
        function play(e) {
            if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') return;
            e.preventDefault();
            if (box.querySelector('iframe')) return;

            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/' + encodeURIComponent(box.dataset.video) + '?autoplay=1';
            iframe.title = 'Ippon Group';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
            iframe.allowFullscreen = true;

            box.innerHTML = '';
            box.appendChild(iframe);
            box.classList.add('is-playing');
        }

        box.addEventListener('click', play);
        box.addEventListener('keydown', play);
    });

    /* --- Karuzela aktualnosci: strzalki + pasek postepu -------------------
       Samo przewijanie i przyciaganie robi CSS (scroll-snap). Strzalka
       przesuwa o jedna karte; pasek pokazuje, jaka czesc pasa jest widoczna
       i gdzie jestesmy. */
    document.querySelectorAll('[data-nh-rail]').forEach(function (rail) {
        var track    = rail.querySelector('[data-nh-rail-track]');
        var controls = rail.querySelector('[data-nh-rail-controls]');
        var bar      = rail.querySelector('[data-nh-rail-bar]');
        var prev     = rail.querySelector('[data-nh-rail-prev]');
        var next     = rail.querySelector('[data-nh-rail-next]');
        if (!track) return;

        function step() {
            var item = track.firstElementChild;
            if (!item) return track.clientWidth;
            var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
            return item.getBoundingClientRect().width + gap;
        }

        function sync() {
            var max = track.scrollWidth - track.clientWidth;

            if (controls) controls.hidden = max <= 1;
            if (prev) prev.disabled = track.scrollLeft <= 1;
            if (next) next.disabled = track.scrollLeft >= max - 1;

            if (bar && track.scrollWidth) {
                var share = track.clientWidth / track.scrollWidth;
                bar.style.width = (share * 100) + '%';
                bar.style.transform = 'translateX(' + (max > 0 ? (track.scrollLeft / max) * (1 / share - 1) * 100 : 0) + '%)';
            }
        }

        function go(dir) {
            var from = track.scrollLeft;
            var by   = dir * step();

            track.scrollBy({ left: by, behavior: 'smooth' });

            /* Chrome nie odtwarza plynnego przewijania w karcie, ktora uznal
               za niewidoczna (np. zasloniete okno) — wtedy przeskok od razu */
            window.setTimeout(function () {
                if (Math.abs(track.scrollLeft - from) < 1) track.scrollLeft = from + by;
                sync();   // tam tez nie przychodzi zdarzenie scroll
            }, 350);
        }

        if (prev) prev.addEventListener('click', function () { go(-1); });
        if (next) next.addEventListener('click', function () { go(1); });

        /* data-nh-rail-auto="ms": pas sam jedzie o karte, na koncu wraca na
           poczatek. Stoi pod kursorem/fokusem, poza oknem i przy "ogranicz ruch". */
        var auto = parseInt(rail.dataset.nhRailAuto, 10);
        if (auto && motion) {
            var held = false, seen = false;

            window.setInterval(function () {
                if (held || !seen || document.hidden) return;
                var max = track.scrollWidth - track.clientWidth;
                if (max <= 1) return;
                if (track.scrollLeft >= max - 1) {
                    track.scrollTo({ left: 0, behavior: 'smooth' });
                    window.setTimeout(sync, 600);
                } else {
                    go(1);
                }
            }, auto);

            rail.addEventListener('mouseenter', function () { held = true; });
            rail.addEventListener('mouseleave', function () { held = false; });
            rail.addEventListener('focusin',    function () { held = true; });
            rail.addEventListener('focusout',   function (e) { if (!rail.contains(e.relatedTarget)) held = false; });
            track.addEventListener('touchstart', function () { held = true; }, { passive: true });

            if ('IntersectionObserver' in window) {
                new IntersectionObserver(function (entries) { seen = entries[0].isIntersecting; }, { threshold: 0.4 }).observe(rail);
            } else {
                seen = true;
            }
        }

        // bez rAF: sync jest tani, a rAF stoi w karcie uznanej za niewidoczna
        track.addEventListener('scroll', sync, { passive: true });
        window.addEventListener('resize', sync);
        window.addEventListener('load', sync);
        sync();
    });

    /* --- Galeria na caly ekran (layouts/partials/ip-gallery, ip-feature) ----
       Bez Bootstrapa: zdjecia przenikaja sie warstwami, opis kazdego slajdu
       jest osobnym blokiem i widac tylko aktywny. Autoplay stoi, gdy kursor
       albo fokus jest w galerii, gdy galeria jest poza oknem i przy
       "ogranicz ruch". Strzalki klawiatury i przesuniecie palcem. */
    document.querySelectorAll('[data-ip-gallery]').forEach(function (gallery) {
        var slides   = gallery.querySelectorAll('[data-ip-gallery-slide]');
        var caps     = gallery.querySelectorAll('[data-ip-gallery-cap]');
        var counter  = gallery.querySelector('[data-ip-gallery-current]');
        var progress = gallery.querySelector('[data-ip-gallery-progress]');
        var count    = slides.length;
        if (count < 2) return;

        var interval = parseInt(gallery.dataset.interval, 10) || 7000;
        var index    = 0;
        var timer    = null;
        var hovered  = false;
        var visible  = false;

        /* opis per slajd jest tylko w ip-gallery; ip-feature ma jeden wspolny */
        function setCap(i, on) {
            var cap = caps[i];
            if (!cap) return;
            cap.classList.toggle('is-active', on);
            if (on) { cap.removeAttribute('aria-hidden'); } else { cap.setAttribute('aria-hidden', 'true'); }
            cap.inert = !on;
        }

        function show(to) {
            to = (to + count) % count;
            if (to === index) return;

            slides[index].classList.remove('is-active');
            slides[index].classList.add('is-leaving');
            var leaving = slides[index];
            window.setTimeout(function () { leaving.classList.remove('is-leaving'); }, 1000);

            setCap(index, false);
            index = to;
            slides[index].classList.add('is-active');
            setCap(index, true);

            if (counter) counter.textContent = String(index + 1).padStart(2, '0');
            schedule();
        }

        function schedule() {
            window.clearTimeout(timer);
            if (progress) progress.classList.remove('is-running');

            if (!motion || hovered || !visible) return;

            if (progress) {
                void progress.offsetWidth;   // restart animacji paska od zera
                progress.classList.add('is-running');
            }
            timer = window.setTimeout(function () { show(index + 1); }, interval);
        }

        gallery.querySelector('[data-ip-gallery-prev]').addEventListener('click', function () { show(index - 1); });
        gallery.querySelector('[data-ip-gallery-next]').addEventListener('click', function () { show(index + 1); });

        gallery.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { show(index - 1); }
            if (e.key === 'ArrowRight') { show(index + 1); }
        });

        function pause(state) { hovered = state; schedule(); }
        gallery.addEventListener('mouseenter', function () { pause(true); });
        gallery.addEventListener('mouseleave', function () { pause(false); });
        gallery.addEventListener('focusin',    function () { pause(true); });
        gallery.addEventListener('focusout',   function (e) { if (!gallery.contains(e.relatedTarget)) pause(false); });

        /* swipe — tylko wyraznie poziomy ruch, pionowy zostaje przewijaniem */
        var startX = null, startY = null;
        gallery.addEventListener('touchstart', function (e) {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        }, { passive: true });
        gallery.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var dx = e.changedTouches[0].clientX - startX;
            var dy = e.changedTouches[0].clientY - startY;
            startX = null;
            if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy) * 1.5) show(index + (dx < 0 ? 1 : -1));
        }, { passive: true });

        /* autoplay tylko, gdy galeria jest w oknie — inaczej uzytkownik
           dojezdza do niej w polowie losowego slajdu */
        if ('IntersectionObserver' in window) {
            new IntersectionObserver(function (entries) {
                visible = entries[0].isIntersecting;
                schedule();
            }, { threshold: 0.35 }).observe(gallery);
        } else {
            visible = true;
            schedule();
        }
    });
})();
