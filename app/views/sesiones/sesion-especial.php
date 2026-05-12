<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sesion['nombre'] ?? 'Sesión Especial') ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
     <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">

</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <!-- HEADER -->
    <div class="sesion-header">
        <span class="sesion-header__etiqueta">Sesión especial</span>
        <h1 class="sesion-header__titulo"><?= htmlspecialchars($sesion['nombre'] ?? '') ?></h1>
        <?php if (!empty($sesion['subtitulo'])): ?>
            <p style="font-style:italic;color:var(--color-acento);margin-bottom:12px;">
                <?= htmlspecialchars($sesion['subtitulo']) ?>
            </p>
        <?php endif; ?>
        <p class="sesion-header__descripcion">
            <?= htmlspecialchars($sesion['descripcion'] ?? '') ?>
        </p>
        <?php if (!empty($sesion['fecha_cierre'])): ?>
            <p style="margin-top:20px;font-size:0.85rem;color:var(--color-texto-suave);">
                🗓 Reservas hasta el <?= date('d/m/Y', strtotime($sesion['fecha_cierre'])) ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- CARRUSEL -->
    <section class="sesion-carrusel">
        <div class="carrusel__track-wrapper">
            <div class="carrusel__track" id="carrusel-track">
                <?php if (!empty($fotos)): ?>
                    <?php foreach ($fotos as $foto): ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                 alt="<?= htmlspecialchars($sesion['nombre']) ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carrusel__slide">
                        <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Próximamente">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($fotos) && count($fotos) > 1): ?>
            <button class="carrusel__flecha carrusel__flecha--prev" id="car-prev">&#8592;</button>
            <button class="carrusel__flecha carrusel__flecha--next" id="car-next">&#8594;</button>
            <div class="carrusel__dots" id="carrusel-dots">
                <?php foreach ($fotos as $i => $foto): ?>
                    <button class="carrusel__dot <?= $i === 0 ? 'activo' : '' ?>" data-index="<?= $i ?>"></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- CTA -->
    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Querés ser parte de esta sesión?</h2>
            <p>Los cupos son limitados. Escribime y reservá tu lugar antes de que se agoten.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi lugar</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>