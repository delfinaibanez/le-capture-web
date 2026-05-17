<?php
$paginaActiva = 'galeria';

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
         <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">

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

    <section class="se-hero <?= $eventoFinalizado ? 'se-hero--finalizado' : '' ?>" style="<?= !empty($sesion['imagen_hero']) ? 'background-image: url(/leCapture_web/le-capture-web/uploads/' . htmlspecialchars($sesion['imagen_hero']) . '); background-size: cover; background-position: center;' : 'background:' . htmlspecialchars($colorPrimario) . ';' ?>">
        <div class="se-hero__tarjeta"></div>
        <div class="se-hero__inner">
            <?php if ($eventoFinalizado): ?>
                <span class="se-hero__badge">Edición finalizada · <?= date('Y', strtotime($sesion['fecha_cierre'])) ?></span>
            <?php else: ?>
                <span class="se-hero__badge">Sesión especial · Edición limitada</span>
            <?php endif; ?>

            <h1 class="se-hero__titulo"><?= htmlspecialchars($sesion['nombre'] ?? '') ?></h1>
            
            <?php if (!empty($sesion['subtitulo'])): ?>
                <p class="se-hero__subtitulo"><?= htmlspecialchars($sesion['subtitulo']) ?></p>
            <?php endif; ?>

            <p class="se-hero__descripcion">
                <?= $eventoFinalizado ? 'Esta edición ya cerró sus reservas. Mirá cómo fue y anotate para no perderte la próxima.' : htmlspecialchars($sesion['descripcion'] ?? '') ?>
            </p>

            <?php if (!$eventoFinalizado && !empty($sesion['fecha_cierre'])): ?>
                <div class="se-countdown" id="countdown" data-fecha="<?= htmlspecialchars($sesion['fecha_cierre']) ?>">
                    <div class="se-countdown__item"><span class="se-countdown__num" id="dias">--</span><span class="se-countdown__label">Días</span></div>
                    <div class="se-countdown__item"><span class="se-countdown__num" id="horas">--</span><span class="se-countdown__label">Horas</span></div>
                    <div class="se-countdown__item"><span class="se-countdown__num" id="mins">--</span><span class="se-countdown__label">Min</span></div>
                </div>
            <?php endif; ?>

            <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">
                <?= $eventoFinalizado ? 'Avisame de la próxima edición' : 'Reservar mi lugar' ?>
            </a>

            <?php if (!$eventoFinalizado && $sesion['cupos_totales'] > 0): ?>
                <p class="se-cupos">⚡ Solo quedan <?= $cuposLibres ?> lugares disponibles</p>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($sesion['por_que_titulo_1'])): ?>
    <section class="se-porque">
        <div class="se-porque__inner">
            <span class="se-porque__etiqueta">Exclusividad</span>
            <h2>¿Por qué es especial?</h2>
            <div class="se-porque__grid">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php if (!empty($sesion["por_que_titulo_$i"])): ?>
                    <div class="se-porque__item">
                        <div class="se-porque__icono">✦</div>
                        <h3><?= htmlspecialchars($sesion["por_que_titulo_$i"]) ?></h3>
                        <p><?= htmlspecialchars($sesion["por_que_desc_$i"] ?? '') ?></p>
                    </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

  <?php if (!empty($sesion['video_url'])): ?>
<section class="se-video">
    <div class="se-video__inner">
        <span class="se-video__etiqueta">Así se vive</span>
        <h2>Detrás de la sesión</h2>
        <?php
            $videoUrl = $sesion['video_url'];
            if (strpos($videoUrl, 'youtube.com/watch') !== false) {
                parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
                $videoId  = $params['v'] ?? '';
                $embedUrl = "https://www.youtube.com/embed/$videoId";
            } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                $videoId  = basename(parse_url($videoUrl, PHP_URL_PATH));
                $embedUrl = "https://www.youtube.com/embed/$videoId";
            } elseif (strpos($videoUrl, 'vimeo.com') !== false) {
                $videoId  = basename(parse_url($videoUrl, PHP_URL_PATH));
                $embedUrl = "https://player.vimeo.com/video/$videoId";
            } else {
                $embedUrl = $videoUrl;
            }
        ?>
        <div class="se-video__polaroid">
            <div class="se-video__frame">
                <iframe src="<?= htmlspecialchars($embedUrl) ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
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
<section class="se-packs">
    <div class="se-packs__inner">
        <span class="se-packs__etiqueta">Packs de fotografía</span>
        <h2>Elegí tu sesión</h2>
        <div class="packs-grid">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <?php if (!empty($sesion["pack{$i}_nombre"])): ?>
                    <?php
                        $destacado = ($i === 2 && !empty($sesion['pack2_destacado']));
                        $items = array_filter(array_map('trim', explode("\n", $sesion["pack{$i}_items"] ?? '')));
                    ?>
                    <div class="pack-card <?= $destacado ? 'destacado' : '' ?>">
                        <?php if ($destacado): ?>
                            <div class="pack-card__badge">Más elegido</div>
                        <?php endif; ?>
                        <div class="pack-card__nombre"><?= htmlspecialchars($sesion["pack{$i}_nombre"]) ?></div>
                        <div class="pack-card__precio"><?= htmlspecialchars($sesion["pack{$i}_precio"]) ?></div>
                        <div class="pack-card__descripcion"><?= htmlspecialchars($sesion["pack{$i}_descripcion"] ?? '') ?></div>
                        <ul class="pack-card__lista">
                            <?php foreach ($items as $item): ?>
                                <?php if (!empty($item)): ?>
                                    <li><?= htmlspecialchars($item) ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <a href="https://wa.me/5492615788997" target="_blank"
                           class="<?= $destacado ? 'btn-primario' : 'btn-secundario' ?>">
                            Reservar Sesión
                        </a>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

  <?php if (!empty($sesion['faq1_pregunta'])): ?>
<section class="sesion-faq">
    <div class="sesion-faq__titulo">
        <span style="font-size:0.72rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--color-acento);display:block;margin-bottom:8px;">
            Todo lo que necesitás saber
        </span>
        <h2>Preguntas frecuentes</h2>
    </div>
    <div class="faq-lista">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php if (!empty($sesion["faq{$i}_pregunta"])): ?>
                <div class="faq-item">
                    <button class="faq-pregunta">
                        <?= htmlspecialchars($sesion["faq{$i}_pregunta"]) ?>
                    </button>
                    <div class="faq-respuesta">
                        <?= htmlspecialchars($sesion["faq{$i}_respuesta"] ?? '') ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>
<?php endif; ?>

    <section class="se-cta" style="<?= !empty($sesion['imagen_hero']) ? 'background-image: url(/leCapture_web/le-capture-web/uploads/' . htmlspecialchars($sesion['imagen_hero']) . ');' : 'background:' . htmlspecialchars($colorPrimario) . ';' ?>">
        <div class="se-cta__tarjeta"></div>
        <div class="se-cta__inner">
            <?php if ($eventoFinalizado): ?>
                <h2>¿Querés ser parte de la próxima edición?</h2>
                <p>Escribime para que te avise cuando abran las reservas de la próxima sesión especial.</p>
                <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">Quiero anotarme</a>
            <?php else: ?>
                <h2><?= htmlspecialchars($sesion['cta_texto'] ?? '¿Lista para tu sesión?') ?></h2>
                <?php if (!empty($sesion['fecha_cierre'])): ?>
                    <p>Los cupos se agotan antes del <?= date('d/m/Y', strtotime($sesion['fecha_cierre'])) ?>. Asegurá el tuyo hoy.</p>
                <?php endif; ?>
                <a href="https://wa.me/5492615788997" target="_blank" class="se-btn-reservar">Reservar ahora</a>
            <?php endif; ?>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion-especial.js"></script>
    <script>
        // Acordeón FAQ
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.parentElement;
                const isActive = item.classList.contains('active');
                document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
                if (!isActive) item.classList.add('active');
            });
        });

        // Countdown simple
        const countdownEl = document.getElementById('countdown');
        if(countdownEl) {
            const fechaStr = countdownEl.getAttribute('data-fecha');
            const target = new Date(fechaStr).getTime();
            setInterval(() => {
                const now = new Date().getTime();
                const diff = target - now;
                if(diff > 0) {
                    document.getElementById('dias').innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
                    document.getElementById('horas').innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    document.getElementById('mins').innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                }
            }, 1000);
        }
    </script>
</body>
</html>