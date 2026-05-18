<?php
$paginaActiva = 'blog';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/blog.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
     <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <section class="blog-hero">
        <h1>Nuestro Blog</h1>
        <p>Consejos, ideas y todo lo que necesitás saber sobre sesiones de fotografía para tu familia.</p>
    </section>

    <section class="blog-filtros">
        <a class="<?= empty($categoriaSeleccionada) ? 'activo' : '' ?>" href="/leCapture_web/le-capture-web/blog">Todos</a>
        <?php foreach (array_merge($categorias, $tematicas) as $categoria): ?>
            <a class="<?= !empty($categoriaSeleccionada) && $categoriaSeleccionada['id'] == $categoria['id'] ? 'activo' : '' ?>"
               href="/leCapture_web/le-capture-web/blog/categoria/<?= htmlspecialchars($categoria['slug']) ?>">
                <?= htmlspecialchars($categoria['nombre']) ?>
            </a>
        <?php endforeach; ?>
    </section>

    <section class="blog-grid">
        <?php if (empty($posts)): ?>
            <div class="vacio" style="grid-column:1/-1; text-align:center; padding:60px 0;">No hay posts publicados todavía.</div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <article class="blog-card">
                    <?php if (!empty($post['imagen_portada'])): ?>
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($post['imagen_portada']) ?>" alt="<?= htmlspecialchars($post['titulo']) ?>">
                    <?php endif; ?>
                    <div class="blog-card-content">
                        <?php if (!empty($post['categoria_nombre'])): ?>
                            <div class="blog-card-meta"><?= htmlspecialchars($post['categoria_nombre']) ?></div>
                        <?php endif; ?>
                        <h2 class="blog-card-title"><?= htmlspecialchars($post['titulo']) ?></h2>
                        <p class="blog-card-text"><?= htmlspecialchars(mb_strimwidth($post['introduccion'] ?? strip_tags($post['contenido']), 0, 140, '...')) ?></p>
                        <div class="blog-card-footer">
                            <span><?= $post['fecha_publicacion'] ? date('d/m/Y', strtotime($post['fecha_publicacion'])) : 'Próximamente' ?></span>
                            <a href="/leCapture_web/le-capture-web/blog/<?= htmlspecialchars($post['slug']) ?>">Leer más →</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
