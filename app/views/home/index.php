<?php
$paginaActiva = 'inicio';
$postsDestacados = $postsDestacados ?? [];
$resenasAprobadas = $resenasAprobadas ?? [];
$categorias = $categorias ?? [];
$fotosMomentos = $fotosMomentos ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Capture — Fotografía de familias</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">

</head>
<body>

    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <!-- ─────────────────────────────────────────
         HERO SLIDER
    ───────────────────────────────────────── -->
<?php
// Detectar extensión de las imágenes del hero automáticamente
function heroImg($numero) {
    $base = __DIR__ . '/../../../public/img/hero' . $numero;
    foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
        if (file_exists($base . '.' . $ext)) {
            return '/leCapture_web/le-capture-web/public/img/hero' . $numero . '.' . $ext;
        }
    }
    return '/leCapture_web/le-capture-web/public/img/placeholder.jpg';
}

$hero1 = heroImg(1);
$hero2 = heroImg(2);
$hero3 = heroImg(3);
?>

<section class="hero">

    <div class="hero__fondo" id="hero-fondo"
         style="background-image: url('<?= $hero1 ?>')">
    </div>

    <div class="hero__tarjeta">
        <div class="hero__slide activo">
            <img src="<?= $hero1 ?>" alt="Sesión de recién nacidos">
        </div>
        <div class="hero__slide">
            <img src="<?= $hero2 ?>" alt="Sesión de embarazo">
        </div>
        <div class="hero__slide">
            <img src="<?= $hero3 ?>" alt="Sesión infantil">
        </div>

        <div class="hero__contenido">
            <h1>Recién Nacidos & Familias</h1>
            <a href="/leCapture_web/le-capture-web/contacto" class="btn-primario">Reservá tu sesión</a>
        </div>
    </div>

    <button class="hero__flecha hero__flecha--prev" id="prev">&#8592;</button>
    <button class="hero__flecha hero__flecha--next" id="next">&#8594;</button>

    <div class="hero__dots">
        <button class="hero__dot activo" data-index="0"></button>
        <button class="hero__dot" data-index="1"></button>
        <button class="hero__dot" data-index="2"></button>
    </div>

</section>
    <!-- ─────────────────────────────────────────
         HOLA SOY CANDELA
    ───────────────────────────────────────── -->
    <section class="sobre-mi">
        <div class="sobre-mi__inner">
            <div class="sobre-mi__foto">
                <img src="/leCapture_web/le-capture-web/public/img/sobre_mi.png" alt="Candela">
            </div>
            <div class="sobre-mi__texto">
                <h2>Hola, soy Candela</h2>
                <p>
                    Fotógrafa especializada en maternidad, recién nacidos y familias. 
                    Creo en la belleza de los momentos simples y en el poder de una 
                    imagen para detener el tiempo. Cada sesión es única, pensada 
                    especialmente para vos y tu familia.
                </p>
                <a href="/leCapture_web/le-capture-web/sobre-mi" class="btn-secundario">Conocé más</a>
            </div>
        </div>


            </section>
            <!-- SESIÓN TEMÁTICA -->
       <?php if (!empty($tematicas) && $fotoTematica): ?>
<section class="tematica-hero">
    <?php foreach ($tematicas as $i => $tem): ?>
        <?php $fotoTem = $fotosPorCategoria[$tem['id']][0] ?? null; ?>
        <?php if ($fotoTem): ?>
        <div class="tematica-hero__slide <?= $i === count($tematicas) - 1 ? 'activo' : '' ?>">
            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($fotoTem['ruta']) ?>"
                 alt="<?= htmlspecialchars($tem['nombre']) ?>">
            <div class="tematica-hero__overlay"></div>
            <div class="tematica-hero__contenido">
                <div class="tematica-hero__sticker">Sesión especial</div>
                <h2><?= htmlspecialchars($tem['nombre']) ?></h2>
                <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($tem['slug']) ?>"
                   class="btn-primario">Ver sesión</a>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if (count($tematicas) > 1): ?>
        <button class="tematica-hero__flecha tematica-hero__flecha--prev" id="tem-prev">&#8592;</button>
        <button class="tematica-hero__flecha tematica-hero__flecha--next" id="tem-next">&#8594;</button>
    <?php endif; ?>
</section>
<?php endif; ?>
    <!-- ─────────────────────────────────────────
         CATEGORÍAS
    ───────────────────────────────────────── -->
    <?php
        $categoriaTextos = [
            'embarazo' => [
                'chapter' => 'Capítulo 1',
                'title' => 'La espera',
                'description' => 'Un tiempo suspendido, el cuerpo cambia, el amor crece y la vida se anuncia en silencio. Cada imagen guarda la emoción de lo que está por llegar.',
                'button' => 'Embarazo',
            ],
            'recien-nacidos' => [
                'chapter' => 'Capítulo 2',
                'title' => 'Tus primeros días',
                'description' => 'Los primeros días son pequeños y eternos a la vez. Gestos mínimos, piel tibia y un amor que acaba de nacer.',
                'button' => 'Recién nacidos',
            ],
            'bebes' => [
                'chapter' => 'Capítulo 3',
                'title' => 'Tus primeras sonrisas',
                'description' => 'Ya no son reflejo. Son respuestas, conexión y alegría que empieza a decir quién es.',
                'button' => 'Bebés',
            ],
            'primer-anio' => [
                'chapter' => 'Capítulo 4',
                'title' => 'Primer añito',
                'description' => 'Doce meses que pasan volando. Un año de aprendizajes, gestos y amor multiplicado.',
                'button' => 'Primer año',
            ],
            'infantiles' => [
                'chapter' => 'Capítulo 5',
                'title' => 'Recuerdos al aire libre',
                'description' => 'Correr, reírse y moverse sin límites. La infancia en su estado más libre y natural.',
                'button' => 'Infantiles',
            ],
        ];

        function normalizarClaveCategoria($valor) {
            $valor = mb_strtolower(trim($valor));
            $valor = str_replace(['á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü', '-'], ['a', 'e', 'i', 'o', 'u', 'n', 'u', ' '], $valor);
            $valor = preg_replace('/\s+/', ' ', $valor);
            return $valor;
        }

        function obtenerTextoCategoria($cat, $textos) {
            $clave = normalizarClaveCategoria($cat['slug'] ?? $cat['nombre'] ?? '');
            if (isset($textos[$clave])) {
                return $textos[$clave];
            }
            $clave = normalizarClaveCategoria($cat['nombre'] ?? '');
            return $textos[$clave] ?? null;
        }
    ?>

    <section class="categorias">
        <div class="categorias__titulo">
            <h2>Desde la espera hasta la infancia</h2>
            <p>Acompañamos cada etapa con sensibilidad y dedicación</p>
        </div>

        <?php if (!empty($categorias)): ?>
            <?php foreach ($categorias as $cat): ?>
                <?php
                    $fotos = $fotosPorCategoria[$cat['id']] ?? [];
                    $imagen = !empty($fotos) ? $fotos[0]['ruta'] : null;
                    $textoCategoria = obtenerTextoCategoria($cat, $categoriaTextos);
                ?>
                <div class="categoria-item">
                    <div class="categoria-item__img">
                        <?php if ($imagen): ?>
                            <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($imagen) ?>"
                                 alt="<?= htmlspecialchars($cat['nombre']) ?>">
                        <?php else: ?>
                            <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg"
                                 alt="<?= htmlspecialchars($cat['nombre']) ?>">
                        <?php endif; ?>
                    </div>
                    <div class="categoria-item__texto">
                        <?php if ($textoCategoria): ?>
                            <span><?= htmlspecialchars($textoCategoria['chapter']) ?></span>
                            <h3><?= htmlspecialchars($textoCategoria['title']) ?></h3>
                            <p><?= htmlspecialchars($textoCategoria['description']) ?></p>
                            <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>"
                               class="btn-secundario"><?= htmlspecialchars($textoCategoria['button']) ?></a>
                        <?php else: ?>
                            <span>Categoría</span>
                            <h3><?= htmlspecialchars($cat['nombre']) ?></h3>
                            <p><?= htmlspecialchars($cat['descripcion'] ?? '') ?></p>
                            <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>"
                               class="btn-secundario">Ver galería</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </section>

    <!-- ─────────────────────────────────────────
         MOMENTOS CAPTADOS
    ───────────────────────────────────────── -->
    <section class="momentos seccion-alt">
        <div class="seccion-titulo">
            <h2>Momentos captados</h2>
            <p>Una selección de instantes que hablan por sí solos</p>
        </div>

        <div class="momentos__grid">
            <?php if (!empty($fotosMomentos)): ?>
                <?php foreach ($fotosMomentos as $i => $foto): ?>
                    <div class="foto <?= $i === 0 ? 'foto--grande' : '' ?>">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($foto['ruta']) ?>"
                             alt="Momento capturado">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="foto foto--grande">
                    <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Foto">
                </div>
                <div class="foto">
                    <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Foto">
                </div>
                <div class="foto">
                    <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Foto">
                </div>
                <div class="foto">
                    <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Foto">
                </div>
                <div class="foto">
                    <img src="/leCapture_web/le-capture-web/public/img/placeholder.jpg" alt="Foto">
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ─────────────────────────────────────────
         RESEÑAS
    ───────────────────────────────────────── -->
    <section class="resenas seccion">
        <div class="seccion-titulo">
            <h2>Lo que dicen las familias</h2>
            <p>Cada experiencia es única y especial</p>
        </div>

        <div class="resenas__grid">
            <?php if (!empty($resenasAprobadas)): ?>
                <?php foreach ($resenasAprobadas as $resena): ?>
                    <div class="resena-card">
                        <div class="resena-card__comilla">"</div>
                        <p class="resena-card__texto"><?= htmlspecialchars($resena['comentario']) ?></p>
                        <div class="resena-card__estrellas">
                            <?= str_repeat('★', $resena['estrellas']) ?>
                            <?= str_repeat('☆', 5 - $resena['estrellas']) ?>
                        </div>
                        <div class="resena-card__autor"><?= htmlspecialchars($resena['nombre_cliente']) ?></div>
                        <div class="resena-card__fecha"><?= date('d/m/Y', strtotime($resena['created_at'])) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;color:var(--color-texto-suave);grid-column:1/-1;">
                    Todavía no hay reseñas publicadas.
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ─────────────────────────────────────────
         BLOG
    ───────────────────────────────────────── -->
    <section class="blog-home seccion-alt">
        <div class="seccion-titulo">
            <h2>Del blog</h2>
            <p>Consejos, inspiración y momentos detrás de escena</p>
        </div>

        <div class="blog-home__grid">
            <?php if (!empty($postsDestacados)): ?>
                <?php foreach ($postsDestacados as $post): ?>
                    <article class="post-card">
                        <?php if ($post['imagen_portada']): ?>
                            <img class="post-card__img"
                                 src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($post['imagen_portada']) ?>"
                                 alt="<?= htmlspecialchars($post['titulo']) ?>">
                        <?php else: ?>
                            <img class="post-card__img"
                                 src="/leCapture_web/le-capture-web/public/img/placeholder.jpg"
                                 alt="Sin imagen">
                        <?php endif; ?>
                        <div class="post-card__body">
                            <span class="post-card__fecha">
                                <?= $post['fecha_publicacion'] ? date('d/m/Y', strtotime($post['fecha_publicacion'])) : '' ?>
                            </span>
                            <h3 class="post-card__titulo"><?= htmlspecialchars($post['titulo']) ?></h3>
                            <p class="post-card__extracto">
                                <?= htmlspecialchars(substr($post['contenido'], 0, 120)) ?>...
                            </p>
                            <a href="/leCapture_web/le-capture-web/blog/<?= htmlspecialchars($post['slug']) ?>"
                               class="post-card__link">Leer más →</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;color:var(--color-texto-suave);grid-column:1/-1;">
                    Próximamente nuevas entradas.
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ─────────────────────────────────────────
         CTA WHATSAPP
    ───────────────────────────────────────── -->
    <section class="cta">
        <div class="cta__inner">
            <h2>¿Lista para tu sesión?</h2>
            <p>Escribime y coordinamos juntas el momento perfecto para tu familia</p>
            <div class="cta__links">
                <a href="https://wa.me/5492615788997" 
                   target="_blank" 
                   class="btn-whatsapp">
                    Escribime por WhatsApp
                </a>
                <a href="https://www.instagram.com/lecapturefotografia?igsh=ZGd2bGx3OHY5dnU5" 
                   target="_blank" 
                   class="cta__instagram">
                    Ver más en Instagram
                </a>
            </div>
        </div>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script>
        const imagenes = [
            '<?= $hero1 ?>',
            '<?= $hero2 ?>',
            '<?= $hero3 ?>'
        ];
    </script>
    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
    <script src="/leCapture_web/le-capture-web/public/js/slider.js"></script>

</body>
</html>