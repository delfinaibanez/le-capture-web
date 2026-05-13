// ─────────────────────────────────────────
// COUNTDOWN
// ─────────────────────────────────────────
const countdown = document.getElementById('countdown');

if (countdown) {
    const fechaCierre = new Date(countdown.dataset.fecha + 'T23:59:59');

    function actualizarCountdown() {
        const ahora = new Date();
        const diff  = fechaCierre - ahora;

        if (diff <= 0) {
            countdown.innerHTML = '<p style="color:rgba(255,255,255,0.6)">Las reservas están cerradas</p>';
            return;
        }

        const dias  = Math.floor(diff / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins  = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

        document.getElementById('dias').textContent  = String(dias).padStart(2, '0');
        document.getElementById('horas').textContent = String(horas).padStart(2, '0');
        document.getElementById('mins').textContent  = String(mins).padStart(2, '0');
    }

    actualizarCountdown();
    setInterval(actualizarCountdown, 1000);
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