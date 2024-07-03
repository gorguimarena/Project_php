let lastScrollTop = 0;
let navbar = document.getElementById('nav-bar');
let timer;

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scroll vers le bas, cache la navbar
        navbar.classList.add('hidden');
    } else {
        // Scroll vers le haut, montre la navbar
        navbar.classList.remove('hidden');
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Pour Mobile ou défilement en haut de page

    // Réinitialiser le timer lorsqu'on scroll
    clearTimeout(timer);
    timer = setTimeout(() => {
        navbar.classList.remove('hidden');
        navbar.classList.add('red');
    }, 150);
});

// Réinitialise la couleur de la navbar quand on scroll à nouveau
window.addEventListener('scroll', function() {
    navbar.classList.remove('red');
});
