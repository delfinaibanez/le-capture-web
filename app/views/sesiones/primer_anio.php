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
     <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <div class="sesion-header">
        <span class="sesion-header__etiqueta">Sesiones</span>
        <h1 class="sesion-header__titulo">Sesión Primer Año</h1>
        <p class="sesion-header__descripcion">
           Cumplir un año es un hito mágico. Con escenografías temáticas y personalizadas, creamos un ambiente divertido para capturar su alegría y energía, logrando fotos auténticas que celebran por siempre su primer cumpleaños.
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
                <div class="pack-card__nombre">Pack Escencial</div>
                <div class="pack-card__precio">$146.000</div>
                <div class="pack-card__descripcion">Para celebrar este hito especial</div>
                <ul class="pack-card__lista">
                    <li>30 Minutos de sesión.</li>
                    <li>Inluye vestuario y accesorios.</li>
                    <li>1 Escenario tematico 100% personalizado.</li>
                    <li>8 Fotografías digitales editadas en alta calidad.</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>No incluye fotos familliares.</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>
            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$216.000</div>
                <div class="pack-card__descripcion">La experiencia completa para el primer cumple</div>
                <ul class="pack-card__lista">
                    <li>1 Horas de sesión.</li>
                    <li>Incluye vestuario y accesorios.</li>
                    <li>3 Escenarios: 1 para el bebé temático 100 personalizado, otro con fondo liso y uno para fotos familiares.</li>
                    <li>20 Fotografías digitales editadas en alta calidad.</li>
                    <li>20 Fotografías impresas en 13x18cm calidad laboratorio.</li>
                    <li>Fotos con mamá, papá, hermanos y hasta 2 abuelos. (Opcional)</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>Entrega en cajita de madera.</li>
                    <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
            </div>
            <div class="pack-card">
                <div class="pack-card__nombre">Pack Silver</div>
                <div class="pack-card__precio">$186.000</div>
                <div class="pack-card__descripcion">El recuerdo más completo del primer año</div>
                <ul class="pack-card__lista">
                    <li>1 Horas de sesión.</li>
                    <li>Incluye vestuario y accesorios.</li>
                    <li>2 Escenarios diferentes, uno para el bebé temático 100% personalizado y otro para fotos familiares.</li>
                    <li>15 Fotografías digitales editadas en alta calidad.</li>
                    <li>15 Fotografías impresas en 13x18 calidad laboratorio.</li>
                    <li>Fotos con mamá, papá y hermanos incluídas.</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>Entrega en cajita de papel.</li>
                    <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
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
                <button class="faq-pregunta">¿Por qué no usás una torta real en la sesión?</button>
                <div class="faq-respuesta">Principalmente por el cuidado de los bebés: muchos pueden tener alergias o intolerancias, y la mayoría no disfruta ensuciarse con crema o comer una torta. Además, al sentirse incómodos, se pierde la naturalidad. Por eso utilizo decoraciones y pasteles falsos, que nos permiten mantener la estética y que tu bebé sea el verdadero protagonista.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Cómo se decide la temática de la sesión?</button>
                <div class="faq-respuesta">La elegimos juntas. Te muestro propuestas de paletas, estilos y escenografías, y buscamos la que más se adapte a tu gusto y a la personalidad de tu bebé.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué se recomienda que usen los papás si también aparecen en las fotos?</button>
                <div class="faq-respuesta">Lo ideal es que elijan prendas cómodas y en colores que combinen entre sí (tonos claros, tierra, pasteles o neutros). Evitar estampados fuertes ayuda a que la atención se centre en el bebé y en la conexión familiar.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿El vestuario está incluído?</button>
                <div class="faq-respuesta">Sí . Cuento con vestuario y accesorios pensados especialmente para bebés de un año, cómodos y estéticos para cámara. Si preferís, también podés traer un conjunto especial que tenga un valor emocional.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Puedo traer mi propia torta?</button>
                <div class="faq-respuesta">Si querés usar una torta real, podés traerla, siempre avisando con anticipación.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Pueden participar tíos o abuelos?</button>
                <div class="faq-respuesta">Sólo en el pack premium hasta 2 abuelos/as, si quieren incluir mas personas en cualquiera de los packs, se abona un adicional de $10.000 por persona.</div>
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