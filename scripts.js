document.addEventListener('DOMContentLoaded', function() {
    const logo = document.querySelector('.logo');
    logo.addEventListener('mouseover', function() {
        logo.classList.add('zoom');
    });
    logo.addEventListener('mouseout', function() {
        logo.classList.remove('zoom');
    });
});
