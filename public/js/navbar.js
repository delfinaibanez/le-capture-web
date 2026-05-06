// Hamburguesa mobile
const hamburguesa = document.getElementById('hamburguesa');
const menuMobile  = document.getElementById('menu-mobile');

if (hamburguesa) {
    hamburguesa.addEventListener('click', () => {
        menuMobile.classList.toggle('abierto');
    });
}

// Sombra al hacer scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (navbar) navbar.classList.toggle('scrolled', window.scrollY > 20);
});

// Dropdown sesiones
const trigger = document.querySelector('.navbar__dropdown-trigger');
const menu    = document.querySelector('.navbar__dropdown-menu');

if (trigger && menu) {
    trigger.addEventListener('click', (e) => {
        e.preventDefault();
        menu.classList.toggle('abierto');
    });

    document.addEventListener('click', (e) => {
        if (!trigger.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove('abierto');
        }
    });
}

// Dropdown mobile sesiones
const mobileTrigger = document.getElementById('mobile-sesiones-trigger');
const mobileMenu    = document.getElementById('mobile-sesiones-menu');

if (mobileTrigger && mobileMenu) {
    mobileTrigger.addEventListener('click', () => {
        mobileMenu.classList.toggle('abierto');
    });
}