// ─────────────────────────────────────────
// CARRUSEL
// ─────────────────────────────────────────
const track = document.getElementById('carrusel-track');
const slides = track ? track.querySelectorAll('.carrusel__slide') : [];
const dots   = document.querySelectorAll('.carrusel__dot');
let actualSlide = 0;

function irASlide(index) {
    actualSlide = (index + slides.length) % slides.length;
    track.style.transform = `translateX(-${actualSlide * 100}%)`;
    dots.forEach(d => d.classList.remove('activo'));
    if (dots[actualSlide]) dots[actualSlide].classList.add('activo');
}

document.getElementById('car-prev')?.addEventListener('click', () => irASlide(actualSlide - 1));
document.getElementById('car-next')?.addEventListener('click', () => irASlide(actualSlide + 1));
dots.forEach(dot => {
    dot.addEventListener('click', () => irASlide(parseInt(dot.dataset.index)));
});

// Auto play cada 4 segundos
if (slides.length > 1) {
    setInterval(() => irASlide(actualSlide + 1), 4000);
}

// ─────────────────────────────────────────
// FAQ
// ─────────────────────────────────────────
document.querySelectorAll('.faq-pregunta').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const estaAbierto = item.classList.contains('abierto');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('abierto'));
        if (!estaAbierto) item.classList.add('abierto');
    });
});