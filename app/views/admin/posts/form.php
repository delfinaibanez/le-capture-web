<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($post) ? 'Editar post' : 'Nuevo post' ?> — Le Capture</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
</head>
<body>
    <aside class="sidebar">
        <div class="logo">Le Capture</div>
        <nav>
            <a href="/leCapture_web/le-capture-web/admin/dashboard">Inicio</a>
            <a href="/leCapture_web/le-capture-web/admin/posts" class="activo">Blog</a>
            <a href="/leCapture_web/le-capture-web/admin/galeria">Galería</a>
            <a href="/leCapture_web/le-capture-web/admin/resenas">Reseñas</a>
        </nav>
        <div class="cerrar">
            <a href="/leCapture_web/le-capture-web/admin/logout">Cerrar sesión</a>
        </div>
    </aside>

    <main class="contenido">
        <div class="cabecera">
            <h1><?= isset($post) ? 'Editar post' : 'Nuevo post' ?></h1>
            <a href="/leCapture_web/le-capture-web/admin/posts" class="volver">← Volver</a>
        </div>

        <div class="card">
            <?php if (!empty($error)): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php
                $action = isset($post)
                    ? '/leCapture_web/le-capture-web/admin/posts/actualizar/' . $post['id']
                    : '/leCapture_web/le-capture-web/admin/posts/guardar';
            ?>

            <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo"
                       value="<?= htmlspecialchars($post['titulo'] ?? '') ?>" required>

                <label for="subtitulo">Subtítulo</label>
                <input type="text" id="subtitulo" name="subtitulo"
                       value="<?= htmlspecialchars($post['subtitulo'] ?? '') ?>">

                <label for="introduccion">Introducción</label>
                <textarea id="introduccion" name="introduccion"><?= htmlspecialchars($post['introduccion'] ?? '') ?></textarea>

                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id" required>
                    <option value="">Seleccioná una categoría</option>
                    <?php foreach ($categorias ?? [] as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>"
                            <?= isset($post['categoria_id']) && $post['categoria_id'] == $categoria['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categoria['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" required><?= htmlspecialchars($post['contenido'] ?? '') ?></textarea>

                <label for="consejo_practico">Consejo práctico</label>
                <textarea id="consejo_practico" name="consejo_practico"><?= htmlspecialchars($post['consejo_practico'] ?? '') ?></textarea>

                <label for="imagen">Imagen de portada</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png,image/webp">
                <?php if (!empty($post['imagen_portada'])): ?>
                    <div class="preview">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($post['imagen_portada']) ?>" alt="Portada actual" style="max-width:200px;border-radius:8px;">
                        <p style="font-size:12px;color:#888;margin-top:4px;">Portada actual</p>
                    </div>
                <?php endif; ?>
                <div class="checks">
                    <label>
                        <input type="checkbox" name="publicado" value="1"
                               <?= !empty($post['publicado']) ? 'checked' : '' ?>>
                        Publicar
                    </label>
                    <label>
                        <input type="checkbox" name="destacado" value="1"
                               <?= !empty($post['destacado']) ? 'checked' : '' ?>>
                        Destacar en inicio
                    </label>
                </div>

                <div class="acciones">
                    <button type="submit" class="btn">Guardar</button>
                    <a href="/leCapture_web/le-capture-web/admin/posts" class="btn btn-secundario">Cancelar</a>
                </div>

            </form>
        </div>
    </main>
</body>
</html>