<?php
$paginaActiva  = 'galeria';

// 1. VALIDACIÓN INICIAL
if (!$sesion) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Sesión no encontrada — Le Capture</title>
        <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
        <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
        <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
        <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
            <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
        
    </head>
    <body>
        <?php require_once __DIR__ . '/../partials/navbar.php'; ?>
        <section style="padding: 120px 20px; text-align: center; min-height: 60vh;">
            <h1 style="font-size: 2.5rem; margin-bottom: 20px;">¡Ups! Sesión no encontrada</h1>
            <p style="color: #666; margin-bottom: 30px;">Parece que esta edición ya no está disponible o el link es incorrecto.</p>
            <a href="/leCapture_web/le-capture-web/" class="btn-primario" style="background: #1a2e1a; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px;">
                Volver al inicio
            </a>
        </section>
        <?php require_once __DIR__ . '/../partials/footer.php'; ?>
    </body>
    </html>
    <?php
    exit;
}

// 2. CÁLCULOS Y VARIABLES
$colorPrimario = $sesion['color_primario'] ?? '#1a2e1a';
$cuposLibres   = ($sesion['cupos_totales'] ?? 0) - ($sesion['cupos_ocupados'] ?? 0);

$hoy         = new DateTime();
$fechaCierre = !empty($sesion['fecha_cierre']) ? new DateTime($sesion['fecha_cierre']) : null;
$eventoFinalizado = $fechaCierre && $hoy > $fechaCierre;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sesion['nombre'] ?? 'Sesión Especial') ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion-especial.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
    <style>
        :root { --color-especial: <?= htmlspecialchars($colorPrimario) ?>; }
    </style>
</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <?php if ($eventoFinalizado): ?>
        <section class="se-hero se-hero--finalizado" style="background: var(--color-especial);">
            <div class="se-hero__inner">
                <span class="se-hero__badge">Edición finalizada · <?= date('Y', strtotime($sesion['fecha_cierre'])) ?></span>
                <h1 class="se-hero__titulo"><?= htmlspecialchars($sesion['nombre'] ?? '') ?></h1>
                <?php if (!empty($sesion['subtitulo'])): ?>
                    <p class="se-hero__subtitulo"><?= htmlspecialchars($sesion['subtitulo']) ?></p>
                <?php endif; ?>
                <p class="se-hero__descripcion">Esta edición ya cerró sus reservas. Mirá cómo fue y anotate para no perderte la próxima.</p>
                <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">Avisame de la próxima edición</a>
            </div>
        </section>
    <?php else: ?>
        <section class="se-hero" style="background: var(--color-especial);<?= !empty($sesion['imagen_hero']) ? 'background-image: url(/leCapture_web/le-capture-web/uploads/' . htmlspecialchars($sesion['imagen_hero']) . '); background-size: cover; background-position: center;' : '' ?>">
            <div class="se-hero__inner">
                <span class="se-hero__badge">Sesión especial · Edición limitada</span>
                <h1 class="se-hero__titulo"><?= htmlspecialchars($sesion['nombre'] ?? '') ?></h1>
                <?php if (!empty($sesion['subtitulo'])): ?>
                    <p class="se-hero__subtitulo"><?= htmlspecialchars($sesion['subtitulo']) ?></p>
                <?php endif; ?>
                <p class="se-hero__descripcion"><?= htmlspecialchars($sesion['descripcion'] ?? '') ?></p>

                <?php if (!empty($sesion['fecha_cierre'])): ?>
                    <div class="se-countdown" id="countdown" data-fecha="<?= htmlspecialchars($sesion['fecha_cierre']) ?>">
                        <div class="se-countdown__item"><span class="se-countdown__num" id="dias">--</span><span class="se-countdown__label">Días</span></div>
                        <div class="se-countdown__item"><span class="se-countdown__num" id="horas">--</span><span class="se-countdown__label">Horas</span></div>
                        <div class="se-countdown__item"><span class="se-countdown__num" id="mins">--</span><span class="se-countdown__label">Min</span></div>
                    </div>
                <?php endif; ?>

                <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">Reservar mi lugar</a>

                <?php if ($sesion['cupos_totales'] > 0): ?>
                    <p class="se-cupos">⚡ Solo quedan <?= $cuposLibres ?> lugares disponibles</p>
                <?php endif; ?>
            </div>
        </section>

        <?php if (!empty($sesion['video_url'])): ?>
        <section class="se-video">
            <div class="se-video__inner">
                <span class="se-video__etiqueta">Así se vive</span>
                <h2>Detrás de la sesión</h2>
                <?php
                    $videoUrl = $sesion['video_url'];
                    if (strpos($videoUrl, 'youtube.com/watch') !== false) {
                        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
                        $videoId = $params['v'] ?? '';
                        $embedUrl = "https://www.youtube.com/embed/$videoId";
                    } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                        $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
                        $embedUrl = "https://www.youtube.com/embed/$videoId";
                    } else { $embedUrl = $videoUrl; }
                ?>
                <div class="se-video__frame">
                    <iframe src="<?= htmlspecialchars($embedUrl) ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($fotos)): ?>
        <section class="se-galeria">
            <span class="se-galeria__etiqueta">La sesión en imágenes</span>
            <h2>Galería editorial</h2>
            <div class="se-galeria__grid">
                <?php foreach ($fotos as $i => $foto): ?>
                    <div class="se-galeria__foto <?= $i === 0 ? 'se-galeria__foto--grande' : '' ?>">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>" alt="Foto">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($sesion['pack1_nombre'])): ?>
        <section class="se-packs" style="background: var(--color-especial);">
            <div class="se-packs__inner">
                <span class="se-packs__etiqueta">Packs de fotografía</span>
                <h2>Elegí tu sesión</h2>
                <div class="packs-grid">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <?php if (!empty($sesion["pack{$i}_nombre"])): 
                            $destacado = ($i === 2 && !empty($sesion['pack2_destacado']));
                            $items = array_filter(explode("\n", $sesion["pack{$i}_items"] ?? ''));
                        ?>
                            <div class="pack-card se-pack-card <?= $destacado ? 'destacado' : '' ?>">
                                <?php if ($destacado): ?><div class="pack-card__badge">Más elegido</div><?php endif; ?>
                                <div class="pack-card__nombre"><?= htmlspecialchars($sesion["pack{$i}_nombre"]) ?></div>
                                <div class="pack-card__precio"><?= htmlspecialchars($sesion["pack{$i}_precio"]) ?></div>
                                <ul class="pack-card__lista">
                                    <?php foreach ($items as $item): ?>
                                        <li><?= htmlspecialchars(trim($item)) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="https://wa.me/5492615788997" target="_blank" class="<?= $destacado ? 'btn-primario' : 'btn-secundario' ?>">Reservar</a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($sesion['faq1_pregunta'])): ?>
        <section class="se-faq">
            <div class="se-faq__inner">
                <span class="se-faq__etiqueta">Despejá tus dudas</span>
                <h2 class="se-faq__titulo">Preguntas frecuentes</h2>
                <div class="faq-container">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <?php if (!empty($sesion["faq{$i}_pregunta"])): ?>
                            <div class="faq-item">
                                <button class="faq-question">
                                    <?= htmlspecialchars($sesion["faq{$i}_pregunta"]) ?>
                                    <span class="faq-icon">
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <?= nl2br(htmlspecialchars($sesion["faq{$i}_respuesta"] ?? '')) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="se-cta" style="background: var(--color-especial);">
            <div class="se-cta__inner">
                <h2><?= htmlspecialchars($sesion['cta_texto'] ?: '¿Querés sumarte a la sesión?') ?></h2>
                <p>Consultá disponibilidad y despejá tus dudas directamente por WhatsApp.</p>
                <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">RESERVAR POR WHATSAPP</a>
            </div>
        </section>

    <?php endif; ?>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script>
        // Lógica de Acordeón FAQ
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.parentElement;
                const isActive = item.classList.contains('active');
                
                // Cerrar otros
                document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
                
                // Abrir el actual si no estaba activo
                if (!isActive) item.classList.add('active');
            });
        });
    </script>
</body>
</html>