// Hamburguesa mobile
const hamburguesa = document.getElementById('hamburguesa');
const menuMobile  = document.getElementById('menu-mobile');

hamburguesa.addEventListener('click', () => {
    menuMobile.classList.toggle('abierto');
});

// Sombra al hacer scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('scrolled', window.scrollY > 20);
});