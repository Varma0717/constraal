// Constraal Frontend JavaScript
// Pure vanilla JavaScript - No dependencies required

document.addEventListener('DOMContentLoaded', function () {
    console.log('Constraal frontend initialized');

    // Mobile Menu Toggle (if header has one)
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.getElementById('nav-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuBtn && navMenu) {
        const openMenu = function () {
            navMenu.classList.remove('hidden');
            navMenu.style.display = 'block';
            if (menuIcon) menuIcon.style.display = 'none';
            if (closeIcon) closeIcon.style.display = 'block';
        };

        const closeMenu = function () {
            navMenu.classList.add('hidden');
            navMenu.style.display = 'none';
            if (menuIcon) menuIcon.style.display = 'block';
            if (closeIcon) closeIcon.style.display = 'none';
        };

        mobileMenuBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isHidden = navMenu.classList.contains('hidden') || navMenu.style.display === 'none' || navMenu.style.display === '';
            if (isHidden) {
                openMenu();
            } else {
                closeMenu();
            }
        });

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function () {
                closeMenu();
            });
        });

        document.addEventListener('click', function (e) {
            const isMenuVisible = !navMenu.classList.contains('hidden') && navMenu.style.display === 'block';
            const isClickInside = navMenu.contains(e.target) || mobileMenuBtn.contains(e.target);

            if (isMenuVisible && !isClickInside) {
                closeMenu();
            }
        });
    }

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});

window.heroSlider = function (slides) {
    return {
        slides: slides || [],
        active: 0,
        timer: null,
        get activeSlide() {
            return this.slides[this.active] || {};
        },
        start() {
            if (this.timer || this.slides.length < 2) {
                return;
            }
            this.timer = setInterval(() => {
                this.next();
            }, 7000);
        },
        stop() {
            if (this.timer) {
                clearInterval(this.timer);
                this.timer = null;
            }
        },
        next() {
            this.active = (this.active + 1) % this.slides.length;
        },
        prev() {
            this.active = (this.active - 1 + this.slides.length) % this.slides.length;
        },
        go(index) {
            this.active = index;
        }
    };
};
