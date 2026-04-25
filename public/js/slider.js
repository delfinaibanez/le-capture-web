const slides = document.querySelectorAll('.hero__slide');
const dots   = document.querySelectorAll('.hero__dot');
const fondo  = document.getElementById('hero-fondo');

let actual   = 0;
let intervalo;

function irA(index) {
    slides[actual].classList.remove('activo');
    dots[actual].classList.remove('activo');
    actual = (index + slides.length) % slides.length;
    slides[actual].classList.add('activo');
    dots[actual].classList.add('activo');
    fondo.style.backgroundImage = `url('${imagenes[actual]}')`;
}

function siguiente() { irA(actual + 1); }
function anterior()  { irA(actual - 1); }

function iniciarAuto() {
    intervalo = setInterval(siguiente, 5000);
}

function reiniciarAuto() {
    clearInterval(intervalo);
    iniciarAuto();
}

document.getElementById('next').addEventListener('click', () => { siguiente(); reiniciarAuto(); });
document.getElementById('prev').addEventListener('click', () => { anterior(); reiniciarAuto(); });

dots.forEach(dot => {
    dot.addEventListener('click', () => {
        irA(parseInt(dot.dataset.index));
        reiniciarAuto();
    });
});

iniciarAuto();