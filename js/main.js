// main.js
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuClose = document.querySelector('.menu-close');
    const siteNavigation = document.getElementById('site-navigation');

    // Function to toggle the menu
    function toggleMenu() {
        siteNavigation.classList.toggle('toggled');
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
    }

    // Event listeners
    menuToggle.addEventListener('click', toggleMenu);
    menuClose.addEventListener('click', toggleMenu);
});
