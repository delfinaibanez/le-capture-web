<?php $paginaActiva = 'tematicas'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones Temáticas — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
     <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/sesion_tematica.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <div class="sesion-header">
        <span class="sesion-header__etiqueta">Sesiones</span>
        <h1 class="sesion-header__titulo">Sesiones Temáticas</h1>
        <p class="sesion-header__descripcion">
            Convertimos tus sueños en recuerdos inolvidables. Desde súperhéroes hasta Navidad, cada sesión temática es única y totalmente personalizada.
        </p>
    </div>

    <?php
        $placeholder = '/leCapture_web/le-capture-web/public/img/placeholder.jpg';
        $imagenesAmbientacion = array_values(array_map(function($t) use ($placeholder) {
            return !empty($t['imagen'])
                ? '/leCapture_web/le-capture-web/uploads/' . $t['imagen']
                : $placeholder;
        }, $tematicas));
        while (count($imagenesAmbientacion) < 5) {
            $imagenesAmbientacion[] = $placeholder;
        }
        $imagenGrande = $imagenesAmbientacion[0];
        $miniImagenes  = array_slice($imagenesAmbientacion, 1, 4);
    ?>

    <section class="seccion sesion-tematicas">
        <div class="container seccion-titulo">
            <h2>Temáticas Disponibles</h2>
            <p>Elegí tu propuesta favorita o consultanos para desarrollar tu idea a medida.</p>
        </div>

        <div class="tematicas-grid">
            <?php if (!empty($tematicas)): ?>
                <?php foreach ($tematicas as $tematica): ?>
                    <article class="tematica-card tematica-card--compact" style="background-image: url('<?= !empty($tematica['imagen']) ? '/leCapture_web/le-capture-web/uploads/' . htmlspecialchars($tematica['imagen']) : '/leCapture_web/le-capture-web/public/img/placeholder.jpg' ?>')">
                        <button class="tematica-card__favorito" aria-label="Guardar favorita">♥</button>
                        <div class="tematica-card__info">
                            <h3><?= htmlspecialchars($tematica['nombre']) ?></h3>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <article class="tematica-card tematica-card--vacio">
                    <div class="tematica-card__info">
                        <h3>Próximamente</h3>
                        <p>Aún no hay temáticas activas. Volvé pronto o escribinos para armar una sesión a medida.</p>
                        <a href="/leCapture_web/le-capture-web/contacto" class="btn-primario">Contactar</a>
                    </div>
                </article>
            <?php endif; ?>
        </div>

        <p class="tematicas-leyenda">¿No encontrás la temática que querés? Contanos y la creamos especialmente para vos.</p>
    </section>

    <section class="seccion seccion-ambientacion">
        <div class="container seccion-titulo">
            <h2>Nuestra Ambientación</h2>
            <p>Props, decoración y estilo para transformar cada sesión en una experiencia única.</p>
        </div>

        <div class="ambientacion-grid">
            <div class="ambientacion-card ambientacion-card--grande">
                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($imagenGrande) ?>" alt="Ambientación grande">
            </div>
            <div class="ambientacion-mosaico">
                <?php foreach ($miniImagenes as $img): ?>
                    <div class="ambientacion-card ambientacion-card--mini">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($img) ?>" alt="Ambientación pequeña">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="seccion sesion-pasos">
        <div class="container seccion-titulo">
            <h2>Cómo Creamos Tu Sesión</h2>
            <p>Un proceso pensado para que todo salga perfecto desde la idea hasta la entrega.</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Consultá tu idea</div>
                <p class="paso__descripcion">Escuchamos tu inspiración y proponemos la mejor ambientación.</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Diseñamos juntos</div>
                <p class="paso__descripcion">Elegimos colores, detalles y el estilo de la temática.</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Preparamos todo</div>
                <p class="paso__descripcion">Armamos el set con props, iluminación y el ambiente ideal.</p>
            </div>
            <div class="paso">
                <div class="paso__numero">4</div>
                <div class="paso__titulo">Sesión mágica</div>
                <p class="paso__descripcion">Capturamos cada momento con cuidado y naturalidad.</p>
            </div>
        </div>
    </section>

    <section class="seccion sesion-packs">
        <div class="container seccion-titulo">
            <h2>Packs de Sesiones Temáticas</h2>
            <p>Todas las opciones incluyen ambientación personalizada y edición profesional.</p>
        </div>
        <div class="packs-grid">
            <div class="pack-card">
                <div class="pack-card__badge">Pack Esencial</div>
                <div class="pack-card__nombre">$60.000</div>
                <div class="pack-card__descripcion">Ideal para sesiones sencillas con decoración temática.</div>
                <ul class="pack-card__lista">
                    <li>30 minutos de sesión</li>
                    <li>1 temática incluida</li>
                    <li>15 fotos digitales</li>
                    <li>Edición básica</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar sesión</a>
                <p class="pack-card__cuotas">Hasta 12 cuotas sin interés</p>
            </div>
            <div class="pack-card destacado">
                <div class="pack-card__badge">Pack Premium</div>
                <div class="pack-card__nombre">$95.000</div>
                <div class="pack-card__descripcion">La opción más completa con ambientación más elaborada.</div>
                <ul class="pack-card__lista">
                    <li>45 minutos de sesión</li>
                    <li>2 temáticas incluidas</li>
                    <li>25 fotos digitales</li>
                    <li>Edición avanzada</li>
                    <li>Mini álbum digital</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar sesión</a>
                <p class="pack-card__cuotas">Hasta 12 cuotas sin interés</p>
            </div>
            <div class="pack-card">
                <div class="pack-card__badge">Pack Deluxe</div>
                <div class="pack-card__nombre">$145.000</div>
                <div class="pack-card__descripcion">Experiencia premium con decoración completa y extras especiales.</div>
                <ul class="pack-card__lista">
                    <li>1 hora de sesión</li>
                    <li>3 temáticas incluidas</li>
                    <li>40 fotos digitales</li>
                    <li>Edición premium</li>
                    <li>Impresiones y álbum digital</li>
                </ul>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar sesión</a>
                <p class="pack-card__cuotas">Hasta 12 cuotas sin interés</p>
            </div>
        </div>
    </section>

    <section class="seccion sesion-faq">
        <div class="container seccion-titulo">
            <h2>Preguntas Frecuentes</h2>
            <p>Todo lo que necesitás saber sobre las sesiones temáticas.</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Puedo elegir cualquier temática que quiera?</button>
                <div class="faq-respuesta">Sí, diseñamos la sesión en base a tu idea y adaptamos la escenografía para que quede perfecta.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿La decoración está incluida o debo llevarla?</button>
                <div class="faq-respuesta">La decoración está incluida en nuestros packs temáticos, con items pensados para cada propuesta.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Cuánto tiempo de anticipación necesito para reservar?</button>
                <div class="faq-respuesta">Recomendamos reservar con al menos 2 semanas de anticipación para asegurar disponibilidad de props y sets.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Puedo combinar varias temáticas en una sola sesión?</button>
                <div class="faq-respuesta">Sí, podemos combinar temáticas según el pack y el tiempo de sesión que elijas.</div>
            </div>
        </div>
    </section>

    <section class="seccion sesion-cta">
        <div class="sesion-cta__inner">
            <h2>¿Lista para crear magia?</h2>
            <p>Cada sesión temática es única y está pensada para que tu idea cobre vida en un espacio especial.</p>
            <div class="sesion-cta__acciones">
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-whatsapp">Consultá por WhatsApp</a>
                <a href="/leCapture_web/le-capture-web/contacto" class="btn-secundario">Enviar consulta</a>
            </div>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
