let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
};

    // Scroll to the desired section on the same page
    function scrollToSection(sectionId) {
        var targetSection = document.querySelector(sectionId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Add 'active' class to the link in the navbar corresponding to the current section
    function setActiveLink() {
        var scrollPosition = window.scrollY;
        var sections = document.querySelectorAll('section[id]');
        sections.forEach(function(section) {
            var sectionTop = section.offsetTop;
            var sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                var targetLink = document.querySelector('header nav a[href="#' + section.id + '"]');
                if (targetLink) {
                    navLinks.forEach(function(link) {
                        link.classList.remove('active');
                    });
                    targetLink.classList.add('active');
                }
            }
        });
    }

    // Listen for scroll events to update active link
    window.addEventListener('scroll', setActiveLink);

    // Typed.js for animating text
    var typed = new Typed('.multiple-text', {
        strings: ['2nd-Year BSIT-MI Student', 'University Scholar'],
        typeSpeed: 100,
        backSpeed: 100,
        backDelay: 1000,
        loop: true
    });

    // ScrollReveal configurations
    ScrollReveal({
        reset: true,
        distance: '80px',
        duration: 2000,
        delay: 200
    });

    ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
    ScrollReveal().reveal('.home-img, .blog-container, .services-box, .contact form', { origin: 'bottom' });
    ScrollReveal().reveal('.home-content h1, .about-img', { origin: 'left' });
    ScrollReveal().reveal('.home-content p, .about-content', { origin: 'right' });

