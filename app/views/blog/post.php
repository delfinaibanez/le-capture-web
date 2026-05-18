<?php
$paginaActiva = 'blog';
$currentUrl = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '/');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['titulo'] ?? 'Blog') ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/blog.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/footer.css">
     <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <?php $readingTime = ceil(str_word_count(strip_tags($post['contenido'])) / 200); ?>
    <main class="blog-post">
        <a class="blog-back-link" href="/leCapture_web/le-capture-web/blog">← Volver al blog</a>

        <header class="blog-post-header">
            <?php if (!empty($post['categoria_nombre'])): ?>
                <span class="tag"><?= htmlspecialchars($post['categoria_nombre']) ?></span>
            <?php endif; ?>

            <div class="blog-post-headline">
                <h1><?= htmlspecialchars($post['titulo']) ?></h1>
                <?php if (!empty($post['subtitulo'])): ?>
                    <p class="lead"><?= htmlspecialchars($post['subtitulo']) ?></p>
                <?php endif; ?>
            </div>

            <?php if (!empty($post['introduccion'])): ?>
                <p class="lead intro-text"><?= htmlspecialchars($post['introduccion']) ?></p>
            <?php endif; ?>

            <div class="blog-post-meta-row">
                <div class="blog-post-meta">
                    <span><?= $post['fecha_publicacion'] ? date('d/m/Y', strtotime($post['fecha_publicacion'])) : 'Próximamente' ?></span>
                    <span><?= $readingTime ?> min de lectura</span>
                    <span>Por <?= htmlspecialchars($post['autor'] ?: 'Candela') ?></span>
                </div>

                <div class="blog-post-share-buttons">
                    <a class="blog-share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($currentUrl) ?>" target="_blank" aria-label="Compartir en Facebook">f</a>
                    <a class="blog-share-button" href="https://www.instagram.com/le-capture-fotografia" target="_blank" aria-label="Instagram">i</a>
                    <a class="blog-share-button" href="https://wa.me/5492615788997?text=Quiero%20ver%20este%20art%C3%ADculo:%20<?= urlencode($currentUrl) ?>" target="_blank" aria-label="Compartir por WhatsApp">↗</a>
                </div>
            </div>
        </header>

        <?php if (!empty($post['imagen_portada'])): ?>
            <div class="blog-post-image">
                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($post['imagen_portada']) ?>" alt="<?= htmlspecialchars($post['titulo']) ?>">
            </div>
        <?php endif; ?>

        <section class="blog-post-body">
            <?= nl2br(htmlspecialchars($post['contenido'])) ?>
        </section>

        <?php if (!empty($post['consejo_practico'])): ?>
            <section class="blog-practical">
                <div class="blog-practical-icon">💡</div>
                <div class="blog-practical-content">
                    <h3>Consejo práctico</h3>
                    <p><?= nl2br(htmlspecialchars($post['consejo_practico'])) ?></p>
                </div>
            </section>
        <?php endif; ?>

        <section class="blog-share">
            <span>Compartir:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($currentUrl) ?>" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/le-capture-fotografia" target="_blank">Instagram</a>
            <a href="https://wa.me/5492615788997?text=Quiero%20ver%20este%20art%C3%ADculo:%20<?= urlencode($currentUrl) ?>" target="_blank">WhatsApp</a>
        </section>

        <?php if (!empty($relacionados)): ?>
            <section class="blog-related">
                <h2>Relacionados</h2>
                <div class="blog-related-grid">
                    <?php foreach ($relacionados as $relacionado): ?>
                        <article class="blog-related-card">
                            <?php if (!empty($relacionado['imagen_portada'])): ?>
                                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($relacionado['imagen_portada']) ?>" alt="<?= htmlspecialchars($relacionado['titulo']) ?>">
                            <?php endif; ?>
                            <div class="blog-related-card-body">
                                <h3><?= htmlspecialchars($relacionado['titulo']) ?></h3>
                                <a href="/leCapture_web/le-capture-web/blog/<?= htmlspecialchars($relacionado['slug']) ?>">Leer más</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
