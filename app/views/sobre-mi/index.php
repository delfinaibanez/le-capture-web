<?php
$paginaActiva = 'sobre-mi';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mí — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sobre-mi.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
    <!-- Fuente elegante para el portfolio -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <main class="portfolio-layout">
        <!-- SECCIÓN INTRO: MÁS AIRE Y ELEGANCIA -->
        <section class="intro-section">
            <div class="intro-grid">
                <div class="intro-content">
                    <span class="tagline">La mirada detrás del lente</span>
                    <h1>Sobre mí</h1>
                    <p class="featured-text">Me llamo Candela y soy fotógrafa especializada en maternidad, recién nacidos y familias. Mi objetivo es capturar lo que no siempre se ve: los gestos, las miradas y la fuerza de cada historia.</p>
                    <p>Detrás de cada foto hay mucho más que técnica: está mi amor por lo visual y mi búsqueda constante de la belleza armónica en cada detalle.</p>
                </div>
                <div class="intro-image">
                    <img src="/leCapture_web/le-capture-web/public/img/sobre_mi.png" alt="Candela Le Capture">
                    <div class="image-experience-badge">10+ Años de Experiencia</div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DETRÁS DE CÁMARA: DISEÑO ASIMÉTRICO -->
        <section class="gallery-section">
            <div class="container">
                <div class="gallery-header">
                    <h2>Detrás de la cámara</h2>
                    <p>Cada sesión es un encuentro auténtico y sensible. Trabajo con paciencia para generar un ambiente cálido donde cada familia se sienta segura y protagonista.</p>
                </div>
                <div class="masonry-gallery">
                    <div class="gallery-item tall">
                        <img src="/leCapture_web/le-capture-web/public/img/hero1.webp" alt="Sesión Maternidad">
                    </div>
                    <div class="gallery-item">
                        <img src="/leCapture_web/le-capture-web/public/img/hero2.webp" alt="Recién nacido detalle">
                    </div>
                    <div class="gallery-item">
                        <img src="/leCapture_web/le-capture-web/public/img/hero3.png" alt="Escenografía">
                    </div>
                    <div class="gallery-item wide">
                        <img src="/leCapture_web/le-capture-web/public/img/hero2.webp" alt="Momento íntimo">
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN MI ESTUDIO: TEXTO FLOTANTE -->
        <section class="studio-section">
            <div class="studio-container">
                <div class="studio-text-card">
                    <h2>Mi Estudio</h2>
                    <p>Ubicado en Mendoza, mi espacio está pensado para la comodidad total. Es un refugio luminoso equipado con materiales suaves y tonos neutros para que la fotografía fluya con naturalidad.</p>
                </div>
                <div class="studio-visuals">
                    <img src="/leCapture_web/le-capture-web/public/img/hero3.png" alt="Estudio Le Capture">
                </div>
            </div>
        </section>
    </main>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
</body>
</html>