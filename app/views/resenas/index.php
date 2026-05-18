<?php
$paginaActiva = 'resenas';
$aprobadas = $aprobadas ?? [];
$mensaje = $mensaje ?? null;
$error = $error ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/contacto.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <main class="seccion pagina-resenas">
        <div class="contenedor">
            <header class="seccion-titulo seccion-titulo--left">
                <h1>Dejá tu reseña</h1>
                <p>Contanos cómo fue tu experiencia sin necesidad de registrarte. Candela podrá revisarla y publicarla en el home.</p>
            </header>

            <?php if ($mensaje): ?>
                <div class="form-exito" style="margin-bottom:24px;">Gracias, tu reseña se envió y pronto será revisada.</div>
            <?php elseif ($error): ?>
                <div class="form-error" style="margin-bottom:24px;">Por favor completá todos los campos y elegí entre 1 y 5 estrellas.</div>
            <?php endif; ?>

            <div class="pagina-resenas__grid">
                <section class="contacto-form">
                    <h2>Escribí tu reseña</h2>
                    <form method="POST" action="/leCapture_web/le-capture-web/resenas/guardar">
                        <div class="form-grupo">
                            <label>Nombre</label>
                            <input type="text" name="nombre" placeholder="Tu nombre" required>
                        </div>
                        <div class="form-grupo">
                            <label>Reseña</label>
                            <textarea name="comentario" rows="6" placeholder="Tu experiencia..." required></textarea>
                        </div>
                        <div class="form-grupo">
                            <label>Puntuación</label>
                            <select name="estrellas" required>
                                <option value="">Elegí estrellas</option>
                                <option value="5">★★★★★</option>
                                <option value="4">★★★★☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="1">★☆☆☆☆</option>
                            </select>
                        </div>
                        <button type="submit" class="form-submit">Enviar reseña</button>
                    </form>
                </section>

                <section class="resenas-listado">
                    <h2>Reseñas publicadas</h2>
                    <?php if (!empty($aprobadas)): ?>
                        <div class="resenas__grid">
                            <?php foreach ($aprobadas as $resena): ?>
                                <article class="resena-card">
                                    <p class="resena-card__texto"><?= htmlspecialchars($resena['comentario']) ?></p>
                                    <div class="resena-card__separador"></div>
                                    <span class="resena-card__autor"><?= htmlspecialchars($resena['nombre_cliente']) ?></span>
                                    <span class="resena-card__meta">Reseña · <?= date('Y', strtotime($resena['created_at'])) ?></span>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="resenas-listado__sin-resenas">Todavía no hay reseñas publicadas. Sé el primero en contar tu experiencia.</p>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </main>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
