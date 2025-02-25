window.addEventListener('scroll', function() {
    var navbar = document.querySelector('nav');
    if (window.scrollY > 5) {
        navbar.classList.add('solid');
    } else {
        navbar.classList.remove('solid');
    }
});
