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
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <main class="sobre-mi-pagina">
        <section class="sobre-mi-pagina__intro">
            <div class="sobre-mi-pagina__inner">
                <div class="sobre-mi-pagina__texto">
                    <h1>Sobre mí</h1>
                    <p>Hace más de 10 años que mi cámara y yo somos inseparables. En este tiempo fotografié a más de 500 bebés y familias, formándome en España en fotografía de recién nacidos y trabajando también en Irlanda y España.

                         Me obsesiona que todo a mi alrededor se vea bonito y armónico: desde los accesorios hasta la decoración de cada escenografía. Y no solo en mi trabajo, también en mi vida diaria. Creo que todo es más lindo cuando le sumamos un poco de color y detalle

                         Me gusta decir que soy “licenciada en casi todo” porque no me conformo con una sola cosa: coso, diseño, decoro y hasta me animo a construir escenografías (aunque la carpintería todavía no es mi fuerte 😅).

                         Detrás de cada foto hay mucho más que técnica: está mi amor por lo visual, mi búsqueda de belleza en cada detalle y la convicción de que los recuerdos se merecen ser tan lindos como la historia que cuentan.</p>

               </div>
                <div class="sobre-mi-pagina__imagen">
                    <img src="/leCapture_web/le-capture-web/public/img/sobre_mi.png" alt="Candela, fotógrafa de Le Capture">
                </div>
            </div>
        </section>

        <section class="detras-camara">
            <div class="seccion-titulo">
                <h2>Detrás de la cámara</h2>
                <p>Cada sesión es un momento especial. Así es como trabajo para capturar la esencia de cada familia.</p>
            </div>
            <div class="detras-camara__texto">
                <p>Trabajo con paciencia y escucha para acompañar cada etapa. Antes de cada sesión, converso con las familias para conocer sus deseos y generar un ambiente cálido, tranquilo y lleno de confianza.</p>
                <p>Me focalizo en la conexión natural entre personas, en los detalles íntimos y en los momentos que suelen pasar rápido. El resultado es una fotografía honesta, emotiva y con un estilo que celebra la ternura de la vida familiar.</p>
            </div>
        </section>

        <section class="mi-estudio">
            <div class="seccion-titulo">
                <h2>Mi estudio</h2>
                <p>Mi espacio está pensado para que las familias se sientan cómodas y disfruten del momento.</p>
            </div>
            <div class="mi-estudio__descripcion">
                <p>El estudio es luminoso y cálido, equipado con fondos suaves, accesorios y materiales confortables para las mamás, los bebés y los niños. Busco un escenario sereno donde cada sesión fluya con naturalidad.</p>
            </div>
            <div class="mi-estudio__grid">
                <div class="mi-estudio__card">
                    <img src="/leCapture_web/le-capture-web/public/img/hero1.webp" alt="Estudio fotográfico 1">
                </div>
                <div class="mi-estudio__card">
                    <img src="/leCapture_web/le-capture-web/public/img/hero2.webp" alt="Estudio fotográfico 2">
                </div>
                <div class="mi-estudio__card">
                    <img src="/leCapture_web/le-capture-web/public/img/hero3.png" alt="Estudio fotográfico 3">
                </div>
            </div>
        </section>
    </main>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
</body>
</html>
