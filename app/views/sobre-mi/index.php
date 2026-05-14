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
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">    
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
                <p class="featured-text">
                        Hace más de <strong>10 años</strong> que mi cámara y yo somos inseparables. 
                        En este camino, tuve el privilegio de fotografiar a más de <strong>500 bebés y familias</strong>, 
                        formándome profesionalmente en <strong>España</strong> en fotografía de recién nacidos 
                        y sumando experiencia trabajando también en <strong>Irlanda</strong>.
                    </p>

                    <p>
                        <strong>Mi obsesión es la armonía.</strong> Me apasiona que todo lo que nos rodea sea visualmente impecable: 
                        desde la elección de los accesorios hasta la composición de cada escenografía. Creo firmemente que la vida 
                        es mucho más linda cuando le sumamos color, dedicación y atención al detalle.
                    </p>

                    <p>
                        Me defino como una <em>"licenciada en casi todo"</em> porque la curiosidad me mueve constantemente: 
                        diseño, decoro, coso y hasta me animo a construir mis propias escenografías 
                        (aunque la carpintería sea mi próximo gran desafío ).
                    </p>

                    <p class="about-footer">
                        Detrás de cada disparo hay mucho más que técnica: está mi amor por lo visual y la convicción de que 
                        <strong>tus recuerdos merecen ser tan hermosos como la historia que cuentan.</strong>
                    </p>
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
                    <div class="gallery-item wide">
                        <img src="/leCapture_web/le-capture-web/public/img/hero2.webp" alt="Momento íntimo">
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
                   <p class="featured-text">
        Mi estudio es un espacio creado para que las familias se sientan <strong>cómodas desde el primer momento</strong>. 
        Está pensado como un pequeño refugio: cálido, acogedor y equipado con todo lo necesario para que tu bebé esté 
        seguro y vos puedas relajarte y disfrutar de la experiencia.
    </p>

    <p>
        <strong>Cada rincón está diseñado con cuidado:</strong> la luz, los detalles delicados en la decoración 
        y los accesorios seleccionados especialmente para cada etapa. Tengo a disposición todo lo necesario 
        —mantitas, fondos y atrezzo exclusivo— para que no tengas que preocuparte por nada más que disfrutar de la sesión.
    </p>

    <p>
        Además, cuento con estrictas <strong>medidas de higiene y seguridad</strong>, porque mi prioridad absoluta 
        es que cada familia viva esta experiencia con total tranquilidad.
    </p>

    <p class="studio-footer">
        Más que un estudio, es un lugar donde los recuerdos comienzan a tomar forma y donde cada sesión 
        se convierte en una <strong>experiencia especial</strong>.
    </p>
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