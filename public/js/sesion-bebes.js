// ─────────────────────────────────────────
// TABS
// ─────────────────────────────────────────
document.querySelectorAll('.sesion-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.sesion-tab').forEach(t => t.classList.remove('activo'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('activo'));
        tab.classList.add('activo');
        document.getElementById('tab-' + tab.dataset.tab).classList.add('activo');
        
        // Mover el slider
        const tabs = document.querySelector('.sesion-tabs');
        if (tab.dataset.tab === '6-9') {
            tabs.classList.add('tab-69');
        } else {
            tabs.classList.remove('tab-69');
        }
    });
});

// ─────────────────────────────────────────
// CARRUSEL 3-6 MESES
// ─────────────────────────────────────────
const track36 = document.getElementById('carrusel-track-36');
const slides36 = track36 ? track36.querySelectorAll('.carrusel__slide') : [];
let actual36 = 0;

function goToSlide36(index) {
    actual36 = (index + slides36.length) % slides36.length;
    track36.style.transform = `translateX(-${actual36 * 100}%)`;
    document.querySelectorAll('#dots-36 .carrusel__dot').forEach((d, i) => {
        d.classList.toggle('activo', i === actual36);
    });
}

function irASlide36(dir) { goToSlide36(actual36 + dir); }

if (slides36.length > 1) {
    setInterval(() => goToSlide36(actual36 + 1), 4000);
}

// ─────────────────────────────────────────
// CARRUSEL 6-9 MESES
// ─────────────────────────────────────────
const track69 = document.getElementById('carrusel-track-69');
const slides69 = track69 ? track69.querySelectorAll('.carrusel__slide') : [];
let actual69 = 0;

function goToSlide69(index) {
    actual69 = (index + slides69.length) % slides69.length;
    track69.style.transform = `translateX(-${actual69 * 100}%)`;
    document.querySelectorAll('#dots-69 .carrusel__dot').forEach((d, i) => {
        d.classList.toggle('activo', i === actual69);
    });
}

function irASlide69(dir) { goToSlide69(actual69 + dir); }

if (slides69.length > 1) {
    setInterval(() => goToSlide69(actual69 + 1), 4000);
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