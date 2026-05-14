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
         <p>
        Tu embarazo es un momento único, lleno de cambios, ilusión y ternura. 
        En esta sesión, mi objetivo es capturar esa <strong>conexión tan especial</strong> 
        que ya te une con tu bebé y tu familia.
        </p>

    <p>
        Cada detalle está pensado para que te sientas <strong>cómoda, tranquila y radiante</strong>. 
        Trabajamos en un ambiente cálido y cuidado, respetando tus tiempos para que la experiencia 
        sea tan linda como el resultado final.
    </p>

    <p>
        Podés elegir el estilo que más te identifique: desde fotografías <strong>íntimas y delicadas en estudio</strong>, 
        hasta imágenes <strong>naturales al aire libre</strong>, aprovechando la luz suave y escenarios que realzan tu esencia.
    </p>

    <p>
        El resultado son recuerdos <strong>auténticos, elegantes y atemporales</strong> que te acompañarán toda la vida.
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
                <div class="pack-card__nombre">Pack Escencial</div>
                <div class="pack-card__precio">$120.000</div>
                <div class="pack-card__descripcion">Para quienes sólo quieren el recuerdo del momento</div>
                <ul class="pack-card__lista">
                    <li>Sesión de 30 minutos en estudio</li>
                    <li>Disponibilidad sólo en estudio</li>
                    <li>Inluye vestuario y accesorios.</li>
                    <li>1 Escenario</li>
                    <li>8 Fotografías digitales editadas en alta calidad.</li>
                    <li>Entrega en álbum digital privado.</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar Sesión</a>
            </div>

            <div class="pack-card destacado">
                <div class="pack-card__badge">Más Elegido</div>
                <div class="pack-card__nombre">Pack Premium</div>
                <div class="pack-card__precio">$178.000</div>
                <div class="pack-card__descripcion">La opción más elegida para una experiencia completa</div>
                <ul class="pack-card__lista">
                    <li>1 Horas de sesión.</li>
                    <li>Incluye vestuario y accesorios.</li>
                    <li>3 Escenarios diferentes con cambio de vestuario.</li>
                    <li>20 Fotografías digitales editadas en alta calidad.</li>
                    <li>20 Fotografías impresas en 13x18cm calidad laboratorio.</li>
                    <li>Fotos del grupo familiar y hasta 2 abuelos.</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>Entrega en cajita de madera.</li>
                    <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar Sesión</a>
            </div>

            <div class="pack-card">
                <div class="pack-card__nombre">Pack Silver</div>
                <div class="pack-card__precio">$156.000</div>
                <div class="pack-card__descripcion"> El equilibrio perfecto </div>
                <ul class="pack-card__lista">
                    <li>1 Hora de sesión.</li>
                    <li>Incluye vestuario y accesorios.</li>
                    <li>2 Escenarios/fondos diferentes con cambio de vestuario.</li>
                    <li>15 Fotografías digitales editadas en alta calidad.</li>
                    <li>15 Fotografías impresas en 13x18 calidad laboratorio.</li>
                    <li>Entrega en álbum digital privado.</li>
                    <li>Entrega en cajita de papel.</li>
                    <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
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
                <button class="faq-pregunta">¿En qué momento del embarazo se recomienda hacer la sesión?</button>
                <div class="faq-respuesta">Lo ideal es entre la semana 28 y la 34, cuando la panza ya está bien formada y vos todavía te sentís cómoda para posar.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Dónde se realizan las fotos?</button>
                <div class="faq-respuesta">Podés elegir entre mi estudio (cálido, preparado y con todo lo necesario) o en exteriores, con escenarios naturales y luz suave.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué ropa tengo que llevar?</button>
                <div class="faq-respuesta">Te recomiendo traer prendas neutras, vestidos largos, ropa cómoda y algún conjunto que te haga sentir especial. En el estudio también tenés accesorios, vestidos y telas que podemos usar.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Puedo decidir la escenografía o los colores de la sesión?</button>
                <div class="faq-respuesta">¡Sí! Antes de la sesión charlamos sobre el estilo que más te guste: colores neutros, escenarios minimalistas o algo más alegre y juguetón. La idea es que las fotos representen tu gusto y personalidad.</div>
            </div>
              <div class="faq-item">
                <button class="faq-pregunta">¿Cuándo recibiremos las fotos?</button>
                <div class="faq-respuesta">En un plazo aproximado de 15 a 20 días hábiles, listas para descargar y/o impresas según el paquete contratado.</div>
            </div>
              <div class="faq-item">
                <button class="faq-pregunta">¿Pueden participar mi pareja o mis hijos?</button>
                <div class="faq-respuesta">¡Por supuesto! Ellos son parte de este momento único y las fotos en familia hacen que la experiencia sea aún más significativa.</div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para tu sesión de embarazo?</h2>
            <p>Cupos limitados por mes. Te sugiero reservar tu lugar con antelación para garantizar disponibilidad en tu semana ideal de embarazo. ¡Aseguremos juntas tus recuerdos!</p>
            <a href="/leCapture_web/le-capture-web/app/views/contacto/index.php" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion.js"></script>

</body>
</html>