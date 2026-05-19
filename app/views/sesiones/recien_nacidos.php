<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión de Recién Nacidos — Le Capture</title>
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
        <h1 class="sesion-header__titulo">Sesión de Recién Nacidos</h1>
        <p class="sesion-header__descripcion">
            Las sesiones de fotos recién nacidos en estudio se realizan durante las primeras dos semanas de vida y suelen durar entre 2 y 3 horas, ya que trabajamos sin apuro, siguiendo siempre el ritmo del bebé. El espacio está preparado para brindar calor, comodidad y seguridad, cuidando cada detalle para que tanto el recién nacido como la familia se sientan relajados. Utilizo poses naturales y accesorios delicados, priorizando siempre el bienestar del bebé para lograr recuerdos únicos y atemporales.
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
                                 alt="Sesión de recién nacidos">
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

    <!-- PACKS -->
    <section class="sesion-packs">
        <div class="sesion-packs__titulo">
            <h2>Packs de Fotografía</h2>
            <p>Elegí el pack que mejor se adapte a lo que buscás</p>
        </div>
        <div class="packs-grid">
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Escencial</div>
                <div class="pack-card__precio">$126.000</div>
                <div class="pack-card__descripcion">Para quienes sólo quieren el recuerdo del momento</div>
                <ul class="pack-card__lista">
                    <li>1 Hora de sesión con el bebé envuelto.</li>
                    <li>8 Fotografías digitales editadas en alta calidad.</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>No incluye fotos familiares</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
                <p class="pack-card__cuotas">Hasta 3 cuotas sin interés con tarjeta.</p>
            </div>

            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$216.000</div>
                <div class="pack-card__descripcion">La experiencia completa para este momento único</div>
                <ul class="pack-card__lista">
                    <li>2 Horas de sesión con el bebé envuelto y posando.</li>
                    <li>3 Escenarios (1 del bebé en cama, 1 del bebé en canasto, 1 familiar)</li>
                    <li>20 Fotografías digitales editadas en alta calidad.</li>
                    <li>20 Fotografías impresas en 13x18cm calidad laboratorio.</li>
                    <li>Fotos con mamá, papá, hermanos y hasta 2 abuelos.(Opcional)</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>Entrega en cajita de madera grabada con su nombre.</li>
                    <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza). </li> 
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
                <p class="pack-card__cuotas">Hasta 6 cuotas sin interés con tarjeta.</p>
            </div>

            <div class="pack-card">
                <div class="pack-card__nombre">Pack Deluxe</div>
                <div class="pack-card__precio">$130.000</div>
                <div class="pack-card__descripcion">La experiencia más completa con recuerdos físicos</div>
                <ul class="pack-card__lista">
                  <li>  2 Horas de sesión con el bebé envuelto y posando.</li>
                  <li>  2 Escenarios (1 del bebé y 1 familiar)</li>
                  <li>  15 Fotografías digitales editadas en alta calidad.</li>
                  <li>  15 Fotografías impresas en 13x18 calidad laboratorio.</li>
                  <li>  Fotos con mamá, papá y hermanos incluídas.</li>
                  <li>  Entrega en álbum digital privado.</li>
                  <li>  Entrega en cajita de papel.</li>
                  <li>  Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
                <p class="pack-card__cuotas">Hasta 4 cuotas sin interés con tarjeta.</p>
            </div>
        </div>
    </section>

    <!-- PASOS -->
    <section class="sesion-pasos">
        <div class="sesion-pasos__titulo">
            <h2>¿Qué esperar en tu sesión?</h2>
            <p>Un paso a paso para que llegués tranquila y disfrutes cada momento</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Reserva</div>
                <p class="paso__descripcion">Coordinamos antes del nacimiento para tener todo listo</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Llegada</div>
                <p class="paso__descripcion">Te recibo en un ambiente cálido y tranquilo</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Sesión</div>
                <p class="paso__descripcion">Trabajamos a tu ritmo con el bebé siempre seguro</p>
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
            <p>Todo lo que necesitás saber sobre las sesiones de recién nacidos</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuándo es el mejor momento para hacer la sesión?</button>
                <div class="faq-respuesta">Lo ideal es entre los 10 y 15 días de vida que es cuando aún conservan el sueño profundo y postura fetal.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Y si mi bebé tiene más de 15 días?</button>
                <div class="faq-respuesta">La sesión se hace igual, adaptandose a lo que el bebé puede hacer, sólo se harán fotos boca arriba, en brazos y envuelto.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuándo reservar?</button>
                <div class="faq-respuesta">Apenas nazca el bebé, cuanto antes mejor</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Debemos llevar algo especial?</button>
                <div class="faq-respuesta">Solo lo que el bebé necesite para estar cómodo: pañales, muda de ropa, mantita y leche materna o fórmula si corresponde. El resto lo tenemos en el estudio.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuándo recibiremos las fotos?</button>
                <div class="faq-respuesta">En un plazo aproximado de 15 a 20 días hábiles, listas para descargar y/o impresas según el paquete contratado.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Pueden participar tíos o abuelos?</button>
                <div class="faq-respuesta">Sólo en el pack premium hasta 2 abuelos/as, si quieren incluir mas personas en cualquiera de los packs, se abona un adicional de $10.000 por persona.</div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para la sesión de tu recién nacido?</h2>
            <p>Reservá antes del nacimiento para asegurar tu lugar en las primeras semanas de vida de tu bebé.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>