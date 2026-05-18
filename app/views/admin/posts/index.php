<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts — Le Capture</title>
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
            <h1>Posts del blog</h1>
            <a href="/leCapture_web/le-capture-web/admin/posts/nuevo" class="btn">+ Nuevo post</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                    <tr><td colspan="4" class="vacio">No hay posts todavía.</td></tr>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($post['titulo']) ?>
                            <?php if ($post['destacado']): ?>
                                <span class="badge destacado">destacado</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($post['categoria_nombre'] ?? 'Sin categoría') ?></td>
                        <td>
                            <span class="badge <?= $post['publicado'] ? 'publicado' : 'borrador' ?>">
                                <?= $post['publicado'] ? 'Publicado' : 'Borrador' ?>
                            </span>
                        </td>
                        <td><?= $post['fecha_publicacion'] ? date('d/m/Y', strtotime($post['fecha_publicacion'])) : '—' ?></td>
                        <td class="acciones">
                            <a href="/leCapture_web/le-capture-web/admin/posts/editar/<?= $post['id'] ?>">Editar</a>
                            <a href="/leCapture_web/le-capture-web/admin/posts/eliminar/<?= $post['id'] ?>"
                               class="eliminar"
                               onclick="return confirm('¿Seguro que querés eliminar este post?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>