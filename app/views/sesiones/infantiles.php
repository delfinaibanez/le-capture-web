<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones Infantiles — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <div class="sesion-header">
        <span class="sesion-header__etiqueta">Sesiones</span>
        <h1 class="sesion-header__titulo">Sesiones Infantiles</h1>
        <p class="sesion-header__descripcion">
            Correr, reír y moverse sin límites. Capturamos la infancia en su estado 
            más libre y natural, con fotos auténticas que reflejan su personalidad única.
        </p>
    </div>

    <section class="sesion-carrusel">
        <div class="carrusel__track-wrapper">
            <div class="carrusel__track" id="carrusel-track">
                <?php if (!empty($fotos)): ?>
                    <?php foreach ($fotos as $foto): ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                 alt="Sesión infantil">
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

    <section class="sesion-packs">
        <div class="sesion-packs__titulo">
            <h2>Packs de Fotografía</h2>
            <p>Elegí el pack que mejor se adapte a lo que buscás</p>
        </div>
        <div class="packs-grid">
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Básico</div>
                <div class="pack-card__precio">$48.000</div>
                <div class="pack-card__descripcion">Para capturar momentos especiales</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 30 minutos</li>
                    <li>10 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>1 locación o escenario</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>
            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$80.000</div>
                <div class="pack-card__descripcion">La experiencia completa para toda la familia</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 1 hora</li>
                    <li>25 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>2 locaciones o escenarios</li>
                    <li>Fotos familiares incluidas</li>
                    <li>5 fotos en blanco y negro</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
            </div>
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Deluxe</div>
                <div class="pack-card__precio">$125.000</div>
                <div class="pack-card__descripcion">El recuerdo más completo de la infancia</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 1.5 horas</li>
                    <li>40 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>3 locaciones o escenarios</li>
                    <li>Fotos familiares incluidas</li>
                    <li>Álbum premium 20x20cm</li>
                    <li>10 impresiones fine art</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>
        </div>
    </section>

    <section class="sesion-pasos">
        <div class="sesion-pasos__titulo">
            <h2>¿Qué esperar en tu sesión?</h2>
            <p>Un paso a paso para que disfrutes cada momento</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Reserva</div>
                <p class="paso__descripcion">Coordinamos fecha, lugar y temática</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Llegada</div>
                <p class="paso__descripcion">Charlamos y elegimos el mejor escenario</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Sesión</div>
                <p class="paso__descripcion">Jugamos y capturamos momentos naturales</p>
            </div>
            <div class="paso">
                <div class="paso__numero">4</div>
                <div class="paso__titulo">Edición</div>
                <p class="paso__descripcion">Retoque y color natural</p>
            </div>
            <div class="paso">
                <div class="paso__numero">5</div>
                <div class="paso__titulo">Entrega</div>
                <p class="paso__descripcion">Galería privada en 2-3 semanas</p>
            </div>
        </div>
    </section>

    <section class="sesion-faq">
        <div class="sesion-faq__titulo">
            <h2>Preguntas Frecuentes</h2>
            <p>Todo lo que necesitás saber sobre las sesiones infantiles</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué edad tienen los niños en las sesiones infantiles?</button>
                <div class="faq-respuesta">Las sesiones infantiles son para niños de 1 a 10 años. Trabajamos con cada edad de forma diferente para capturar su personalidad única.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Se pueden hacer en exteriores?</button>
                <div class="faq-respuesta">¡Sí! Podemos hacer la sesión en el estudio, en un parque, en su casa o en cualquier lugar especial para la familia. Lo coordinamos juntos.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué pasa si el niño no quiere que le saquen fotos?</button>
                <div class="faq-respuesta">Trabajamos con mucha paciencia y de forma lúdica. Nunca forzamos. Si el niño no está de humor ese día podemos reprogramar la sesión sin costo adicional.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Pueden venir los hermanos o toda la familia?</button>
                <div class="faq-respuesta">¡Por supuesto! Podemos incluir fotos con hermanos y familiares dentro de la misma sesión. Es un momento hermoso para capturar juntos.</div>
            </div>
        </div>
    </section>

    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para capturar la infancia de tu hijo?</h2>
            <p>Reservá tu sesión y capturemos juntas esos momentos únicos que pasan tan rápido.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>