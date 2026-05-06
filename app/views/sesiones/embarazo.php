<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión de Embarazo — Le Capture</title>
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
        <span class="sesion-header__etiqueta">Sesiones</span>
        <h1 class="sesion-header__titulo">Sesión de Embarazo</h1>
        <p class="sesion-header__descripcion">
            La espera es un capítulo único en tu vida. Capturamos la belleza de tu embarazo 
            con fotos naturales, emotivas y atemporales que vas a atesorar para siempre.
        </p>
    </div>

    <!-- CARRUSEL -->
    <section class="sesion-carrusel">
        <div class="carrusel__track-wrapper">
            <div class="carrusel__track" id="carrusel-track">
                <?php if (!empty($fotos)): ?>
                    <?php foreach ($fotos as $foto): ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                 alt="Sesión de embarazo">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carrusel__slide">
                        <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Próximamente">

                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (count($fotos) > 1): ?>
            <button class="carrusel__flecha carrusel__flecha--prev" id="car-prev">&#8592;</button>
            <button class="carrusel__flecha carrusel__flecha--next" id="car-next">&#8594;</button>
            <div class="carrusel__dots" id="carrusel-dots">
                <?php foreach ($fotos as $i => $foto): ?>
                    <button class="carrusel__dot <?= $i === 0 ? 'activo' : '' ?>" data-index="<?= $i ?>"></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- PACKS -->
    <section class="sesion-packs">
        <div class="sesion-packs__titulo">
            <h2>Packs de Fotografía</h2>
            <p>Elegí el pack que mejor se adapte a lo que buscás</p>
        </div>
        <div class="packs-grid">
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Básico</div>
                <div class="pack-card__precio">$45.000</div>
                <div class="pack-card__descripcion">Ideal para capturar los momentos esenciales de tu embarazo</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 30 minutos en estudio</li>
                    <li>15 fotos editadas en alta resolución</li>
                    <li>Galería digital privada</li>
                    <li>1 outfit/cambio de vestuario</li>
                    <li>Asesoramiento de poses</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>

            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$75.000</div>
                <div class="pack-card__descripcion">La opción más elegida para una experiencia completa</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 60 minutos en estudio</li>
                    <li>30 fotos editadas en alta resolución</li>
                    <li>Galería digital privada</li>
                    <li>2 outfits/cambios de vestuario</li>
                    <li>Asesoramiento de poses y styling</li>
                    <li>5 fotos artísticas en blanco y negro</li>
                    <li>Telas y accesorios del estudio incluidos</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
            </div>

            <div class="pack-card">
                <div class="pack-card__nombre">Pack Deluxe</div>
                <div class="pack-card__precio">$120.000</div>
                <div class="pack-card__descripcion">La experiencia más completa con productos físicos</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 90 minutos en estudio</li>
                    <li>50 fotos editadas en alta resolución</li>
                    <li>Galería digital privada</li>
                    <li>3 outfits/cambios de vestuario</li>
                    <li>Asesoramiento de poses y styling completo</li>
                    <li>10 fotos artísticas en blanco y negro</li>
                    <li>Telas, accesorios y flores incluidos</li>
                    <li>Álbum premium 20x20cm con 20 fotos</li>
                    <li>5 impresiones fine art 13x18cm</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>
        </div>
    </section>

    <!-- PASOS -->
    <section class="sesion-pasos">
        <div class="sesion-pasos__titulo">
            <h2>¿Qué esperar en tu sesión?</h2>
            <p>Un paso a paso para que llegues tranquila y disfrutes cada momento</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Reserva</div>
                <p class="paso__descripcion">Coordinamos tu sesión para el momento ideal (semanas 28-34)</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Llegada</div>
                <p class="paso__descripcion">Te recibo, charlamos y elegís telas, vestidos y accesorios</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Sesión</div>
                <p class="paso__descripcion">Trabajamos tranquilas, a tu ritmo, con poses guiadas</p>
            </div>
            <div class="paso">
                <div class="paso__numero">4</div>
                <div class="paso__titulo">Edición</div>
                <p class="paso__descripcion">Retoque profesional: luz, color y corrección natural</p>
            </div>
            <div class="paso">
                <div class="paso__numero">5</div>
                <div class="paso__titulo">Entrega</div>
                <p class="paso__descripcion">Galería digital en 2-3 semanas con alta resolución</p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="sesion-faq">
        <div class="sesion-faq__titulo">
            <h2>Preguntas Frecuentes</h2>
            <p>Todo lo que necesitás saber sobre las sesiones de embarazo</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuál es el mejor momento para hacer la sesión de embarazo?</button>
                <div class="faq-respuesta">El momento ideal es entre las semanas 28 y 34 de gestación. En esta etapa la panza ya es visible y redonda, pero todavía te sentís cómoda y con energía para la sesión.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué debo llevar a la sesión?</button>
                <div class="faq-respuesta">No necesitás traer nada especial. El estudio cuenta con telas, vestidos y accesorios para la sesión. Si tenés algún elemento especial como una ecografía o algo significativo para vos, podés traerlo.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Puede venir mi pareja y/o hijos a la sesión?</button>
                <div class="faq-respuesta">¡Por supuesto! Es hermoso capturar esos momentos en familia. Podemos incluir fotos con tu pareja e hijos dentro de la misma sesión sin costo adicional.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuánto tiempo dura la sesión?</button>
                <div class="faq-respuesta">Depende del pack elegido: el Básico dura 30 minutos, el Premium 60 minutos y el Deluxe 90 minutos. Siempre trabajamos a tu ritmo y con descansos si los necesitás.</div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para tu sesión de embarazo?</h2>
            <p>Reservá tu lugar con tiempo. Las sesiones de embarazo se agendan con anticipación para asegurar que estemos en el momento ideal de tu gestación.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>