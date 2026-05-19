<?php $paginaActiva = 'galeria'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión de Bebés — Le Capture</title>
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
        <h1 class="sesion-header__titulo">Sesión de Bebés</h1>
        <div class="sesion-tabs">
            <button class="sesion-tab activo" data-tab="3-6">3 a 6 meses</button>
            <button class="sesion-tab" data-tab="6-9">6 a 9 meses</button>
        </div>
    </div>

    <!-- SECCIÓN 3-6 MESES -->
    <div class="tab-content activo" id="tab-3-6">
        <div class="sesion-tab-descripcion">
            <p>3 Meses: Primeras sonrisas. A los tres meses capturamos sus primeras expresiones despiertas y la ternura de sus gestos, justo cuando empiezan a sostener su cabecita y a regalarnos sonrisas más conscientes.</p>
        </div>

        <!-- CARRUSEL 3-6 -->
        <section class="sesion-carrusel">
            <div class="carrusel__track-wrapper">
                <div class="carrusel__track" id="carrusel-track-36">
                    <?php if (!empty($fotos36)): ?>
                        <?php foreach ($fotos36 as $foto): ?>
                            <div class="carrusel__slide">
                                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                     alt="Bebés 3 a 6 meses">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Próximamente">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($fotos36) && count($fotos36) > 1): ?>
                <button class="carrusel__flecha carrusel__flecha--prev" onclick="irASlide36(-1)">&#8592;</button>
                <button class="carrusel__flecha carrusel__flecha--next" onclick="irASlide36(1)">&#8594;</button>
                <div class="carrusel__dots" id="dots-36">
                    <?php foreach ($fotos36 as $i => $foto): ?>
                        <button class="carrusel__dot <?= $i === 0 ? 'activo' : '' ?>" data-index="<?= $i ?>" onclick="goToSlide36(<?= $i ?>)"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- PACKS 3-6 -->
        <section class="sesion-packs">
            <div class="sesion-packs__titulo">
                <h2>Packs de Fotografía</h2>
                <p>Bebés de 3 a 6 meses — elegí el pack ideal</p>
            </div>
            <div class="packs-grid">
                <div class="pack-card">
                    <div class="pack-card__nombre">Pack Esencial</div>
                    <div class="pack-card__precio">$120.000</div>
                    <div class="pack-card__descripcion">Para quienes sólo quieren el recuerdo del momento</div>
                    <ul class="pack-card__lista">
                        <li>30 Minutos de sesión.</li>
                        <li>1 Escenario.</li>
                        <li>8 Fotografías digitales editadas en alta calidad.</li>
                        <li>Entrega en álbum digital privado.</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 3 cuotas sin interés con tarjeta.</p>
                </div>
                <div class="pack-card destacado">
                    <div class="pack-card__badge">Más elegido</div>
                    <div class="pack-card__nombre">Pack Premium</div>
                    <div class="pack-card__precio">$178.000</div>
                    <div class="pack-card__descripcion">La experiencia completa para esta etapa</div>
                    <ul class="pack-card__lista">
                        <li>1 Horas de sesión.</li>
                        <li>3 Escenarios (2 para el bebé y uno para fotos familiares)</li>
                        <li>20 Fotografías digitales editadas en alta calidad.</li>
                        <li>20 Fotografías impresas en 13x18cm calidad laboratorio.</li>
                        <li>Fotos con mamá, papá, hermanos y hasta 2 abuelos. (Opcional)</li>
                        <li>Entrega en álbum digital privado.</li>
                        <li>Entrega en cajita de madera.</li>
                        <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 6 cuotas sin interés con tarjeta.</p>
                </div>
                <div class="pack-card">
                    <div class="pack-card__nombre">Pack Silver</div>
                    <div class="pack-card__precio">$156.000</div>
                    <div class="pack-card__descripcion">Más tiempo y escenarios para elegir</div>
                    <ul class="pack-card__lista">
                      
                        <li>1 Horas de sesión.</li>
                        <li>2 Escenarios diferentes, uno para el bebé y otro para fotos familiares.</li>
                        <li>15 Fotografías digitales editadas en alta calidad.</li>
                        <li>15 Fotografías impresas en 13x18 calidad laboratorio.</li>
                        <li>Fotos con mamá, papá y hermanos incluídas.</li>
                        <li>Entrega en álbum digital privado.</li>
                        <li>Entrega en cajita de papel.</li>
                        <li>Envío a domicilio incluído (Válido sólo para el Gran Mendoza).</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 4 cuotas sin interés con tarjeta.</p>
                </div>
            </div>
        </section>

    </div>

    <!-- SECCIÓN 6-9 MESES -->
    <div class="tab-content" id="tab-6-9">
        <div class="sesion-tab-descripcion">
            <p>6 a 9 Meses: Sentarse y jugar. ¡Pura diversión! Es la etapa ideal para fotografiar su espontaneidad: cuando ya se sientan por sí mismos, gatean y descubren el mundo con una alegría contagiosa.</p>
        </div>

        <!-- CARRUSEL 6-9 -->
        <section class="sesion-carrusel">
            <div class="carrusel__track-wrapper">
                <div class="carrusel__track" id="carrusel-track-69">
                    <?php if (!empty($fotos69)): ?>
                        <?php foreach ($fotos69 as $foto): ?>
                            <div class="carrusel__slide">
                                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                                     alt="Bebés 6 a 9 meses">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carrusel__slide">
                            <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Próximamente">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($fotos69) && count($fotos69) > 1): ?>
                <button class="carrusel__flecha carrusel__flecha--prev" onclick="irASlide69(-1)">&#8592;</button>
                <button class="carrusel__flecha carrusel__flecha--next" onclick="irASlide69(1)">&#8594;</button>
                <div class="carrusel__dots" id="dots-69">
                    <?php foreach ($fotos69 as $i => $foto): ?>
                        <button class="carrusel__dot <?= $i === 0 ? 'activo' : '' ?>" data-index="<?= $i ?>" onclick="goToSlide69(<?= $i ?>)"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- PACKS 6-9 -->
        <section class="sesion-packs">
            <div class="sesion-packs__titulo">
                <h2>Packs de Fotografía</h2>
                <p>Bebés de 6 a 9 meses — elegí el pack ideal</p>
            </div>
            <div class="packs-grid">
                <div class="pack-card">
                    <div class="pack-card__nombre">Pack Esencial</div>
                    <div class="pack-card__precio">$120.000</div>
                    <div class="pack-card__descripcion">Para capturar los primeros movimientos</div>
                    <ul class="pack-card__lista">
                        <li>30 min de sesión</li>
                        <li>1 escenario</li>
                        <li>10 fotos digitales</li>
                        <li>Álbum digital</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 3 cuotas sin interés con tarjeta.</p>
                </div>
                <div class="pack-card destacado">
                    <div class="pack-card__badge">Más elegido</div>
                    <div class="pack-card__nombre">Pack Premium</div>
                    <div class="pack-card__precio">$185.000</div>
                    <div class="pack-card__descripcion">La experiencia completa para esta etapa</div>
                    <ul class="pack-card__lista">
                        <li>1 hora de sesión</li>
                        <li>3 escenarios</li>
                        <li>25 fotos digitales</li>
                        <li>Fotos impresas</li>
                        <li>Álbum digital</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 6 cuotas sin interés con tarjeta.</p>
                </div>
                <div class="pack-card">
                    <div class="pack-card__nombre">Pack Silver</div>
                    <div class="pack-card__precio">$158.000</div>
                    <div class="pack-card__descripcion">Más tiempo y escenarios para elegir</div>
                    <ul class="pack-card__lista">
                        <li>1 hora de sesión</li>
                        <li>2 escenarios</li>
                        <li>18 fotos digitales</li>
                        <li>Copia en papel</li>
                    </ul>
                    <a href="https://wa.me/5492615788997" target="_blank" class="btn-secundario">Reservar</a>
                    <p class="pack-card__cuotas">Hasta 4 cuotas sin interés con tarjeta.</p>
                </div>
            </div>
        </section>

    </div>

    <!-- PASOS -->
    <section class="sesion-pasos">
        <div class="sesion-pasos__titulo">
            <h2>¿Qué esperar en tu sesión?</h2>
            <p>Un paso a paso pensado para que disfrutes cada momento</p>
        </div>
        <div class="pasos-grid">
            <div class="paso">
                <div class="paso__numero">1</div>
                <div class="paso__titulo">Reserva</div>
                <p class="paso__descripcion">Coordinamos fecha y horario ideal</p>
            </div>
            <div class="paso">
                <div class="paso__numero">2</div>
                <div class="paso__titulo">Llegada</div>
                <p class="paso__descripcion">Te recibo con todo listo</p>
            </div>
            <div class="paso">
                <div class="paso__numero">3</div>
                <div class="paso__titulo">Sesión</div>
                <p class="paso__descripcion">A tu ritmo, sin apuros</p>
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

    <!-- FAQ -->
    <section class="sesion-faq">
        <div class="sesion-faq__titulo">
            <h2>Preguntas Frecuentes</h2>
            <p>Todo lo que necesitás saber sobre las sesiones de bebés</p>
        </div>
        <div class="faq-lista">
            <div class="faq-item">
                <button class="faq-pregunta">¿Por qué es especial hacer fotos a los 3-6 meses?</button>
                <div class="faq-respuesta">Porque el bebé ya puede levantar y sostener la cabeza, muestra sonrisas más conscientes y se conecta mucho con la cámara y con sus papás.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué tipo de fotos se logran en esta etapa?</button>
                <div class="faq-respuesta">Se capturan miradas despiertas, sonrisas, expresiones curiosas y también retratos junto a la familia que reflejan ternura y conexión.</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿Qué debo llevar a la sesión?</button>
                <div class="faq-respuesta">Sólo lo que el bebé necesite para cuidado personal, ropita facil de sacar y, si quieren pueden llevar algún muñequito u objeto que tenga significado para ustedes</div>
            </div>
            <div class="faq-item">
                <button class="faq-pregunta">¿La sesión incluye vestuario?</button>
                <div class="faq-respuesta">Por supuesto, tengo muchas opciones de colores y estilos para bebés en todas las edades, también incluye todos los accesorios.</div>

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
            <h2>¿Lista para la sesión de tu bebé?</h2>
            <p>Reservá con anticipación para asegurar el momento ideal según la etapa de tu bebé.</p>
            <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">Reservar mi Sesión</a>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/sesion-bebes.js"></script>

</body>
</html>