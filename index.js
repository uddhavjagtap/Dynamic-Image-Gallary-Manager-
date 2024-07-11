document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.burger');
    const navbarLinks = document.querySelector('.navbar-links');

    burger.addEventListener('click', function() {
        navbarLinks.classList.toggle('active');
        burger.classList.toggle('active');
    });
});
