/**
 * BandungCoding – Main JavaScript Entry
 *
 * Hanya microinteraction ringan — performa tetap optimal.
 * Tidak ada framework berat, cukup vanilla JS.
 */

import './bootstrap';

/**
 * Navbar: Tambah shadow saat scroll
 */
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('main-navbar');
    const mobileMenuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.querySelector('[data-menu-icon]');

    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        }, { passive: true });
    }

    if (mobileMenuBtn && mobileMenu) {
        const closeMenu = () => {
            mobileMenu.classList.add('hidden');
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
            if (menuIcon) menuIcon.textContent = 'menu';
        };

        const toggleMenu = () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', 'true');
                if (menuIcon) menuIcon.textContent = 'close';
            } else {
                closeMenu();
            }
        };

        mobileMenuBtn.addEventListener('click', toggleMenu);

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1280) {
                closeMenu();
            }
        });
    }
});

/**
 * Scroll Reveal: Animasi elemen saat masuk viewport
 * - data-animate: animasi pada section/elemen utama
 * - data-stagger: animasi stagger (berurutan) pada child elements
 */
document.addEventListener('DOMContentLoaded', () => {
    // ── Animasi section utama ──
    const targets = document.querySelectorAll('[data-animate]');

    const sectionObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    sectionObserver.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: '0px 0px -60px 0px', threshold: 0.08 }
    );

    targets.forEach((el) => sectionObserver.observe(el));

    // ── Animasi stagger: child items muncul berurutan ──
    const staggerTargets = document.querySelectorAll('[data-stagger]');

    const staggerObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const children = Array.from(entry.target.children);
                    children.forEach((child, i) => {
                        setTimeout(() => {
                            child.style.transitionDelay = `${i * 100}ms`;
                        }, 0);
                    });
                    // Sedikit delay agar transitionDelay sempat diset
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            entry.target.classList.add('is-visible');
                        });
                    });
                    staggerObserver.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: '0px 0px -40px 0px', threshold: 0.08 }
    );

    staggerTargets.forEach((el) => staggerObserver.observe(el));
});

/**
 * Dark/Light Mode Toggle
 */
document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    if (themeToggleBtn) {
        // Set initial icon based on current class
        if (document.documentElement.classList.contains('dark')) {
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
        } else {
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
            } else {
                localStorage.setItem('theme', 'light');
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        });
    }
});
