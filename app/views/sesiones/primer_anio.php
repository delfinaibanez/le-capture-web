<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Primer Año — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <div class="sesion-header">
        <span class="sesion-header__etiqueta">Sesiones</span>
        <h1 class="sesion-header__titulo">Sesión Primer Año</h1>
        <p class="sesion-header__descripcion">
            Doce meses que pasan volando. Capturamos ese primer añito lleno de 
            aprendizajes, sonrisas y amor multiplicado para que lo recuerdes siempre.
        </p>
    </div>

    <section class="sesion-carrusel">
        <div class="carrusel__track-wrapper">
            <div class="carrusel__track" id="carrusel-track">
                <?php if (!empty($fotos)): ?>
                    <?php foreach ($fotos as $foto): ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                 alt="Sesión primer año">
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
            <p>Elegí el pack ideal para celebrar este primer año</p>
        </div>
        <div class="packs-grid">
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Básico</div>
                <div class="pack-card__precio">$55.000</div>
                <div class="pack-card__descripcion">Para celebrar este hito especial</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 45 minutos</li>
                    <li>12 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>1 escenario con torta smash</li>
                    <li>Accesorios incluidos</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>
            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$90.000</div>
                <div class="pack-card__descripcion">La experiencia completa para el primer cumple</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 1.5 horas</li>
                    <li>30 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>3 escenarios con torta smash</li>
                    <li>Fotos familiares incluidas</li>
                    <li>Accesorios y decoración incluidos</li>
                    <li>5 fotos en blanco y negro</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
            </div>
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Deluxe</div>
                <div class="pack-card__precio">$140.000</div>
                <div class="pack-card__descripcion">El recuerdo más completo del primer año</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 2 horas</li>
                    <li>45 fotos editadas</li>
                    <li>Galería digital privada</li>
                    <li>4 escenarios con torta smash</li>
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
            <p>Un paso a paso para que disfrutes cada momento del primer cumple</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Reserva</div>
                <p class="paso__descripcion">Coordinamos fecha y decoración ideal</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Llegada</div>
                <p class="paso__descripcion">Todo listo para el festejo</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Sesión</div>
                <p class="paso__descripcion">A su ritmo, sin apuros</p>
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
            <p>Todo lo que necesitás saber sobre la sesión de primer año</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuándo hacemos la sesión respecto al cumpleaños?</button>
                <div class="faq-respuesta">Podemos hacerla días antes o después del cumpleaños. Lo importante es que el bebé esté descansado y de buen humor para disfrutar la sesión.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿La torta la traigo yo o la proveen?</button>
                <div class="faq-respuesta">Podés traer la torta vos o nosotros te recomendamos una pastelera. Lo coordinamos con anticipación para que todo quede perfecto.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Pueden venir hermanos y abuelos?</button>
                <div class="faq-respuesta">¡Claro que sí! Podemos incluir fotos familiares dentro de la sesión sin costo adicional.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué ropa le pongo al bebé?</button>
                <div class="faq-respuesta">Tonos pastel o neutros funcionan muy bien. Evitá estampados llamativos. El estudio tiene accesorios y prendas disponibles si lo necesitás.</div>
            </div>
        </div>
    </section>

    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para celebrar el primer año?</h2>
            <p>Reservá con anticipación para asegurar la fecha ideal y que todo esté perfecto para este momento tan especial.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>