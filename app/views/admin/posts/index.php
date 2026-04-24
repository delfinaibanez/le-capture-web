<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts — Le Capture</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; display: flex; min-height: 100vh; }
        .sidebar { width: 240px; background: #1a1a1a; color: #fff; display: flex; flex-direction: column; padding: 32px 0; position: fixed; top: 0; left: 0; height: 100vh; }
        .sidebar .logo { font-size: 18px; font-weight: 500; padding: 0 24px 32px; border-bottom: 1px solid #333; color: #b07d62; }
        .sidebar nav { padding: 24px 0; flex: 1; }
        .sidebar nav a { display: block; padding: 12px 24px; color: #aaa; text-decoration: none; font-size: 14px; transition: all .2s; }
        .sidebar nav a:hover, .sidebar nav a.activo { color: #fff; background: #2a2a2a; border-left: 3px solid #b07d62; }
        .sidebar .cerrar { padding: 24px; border-top: 1px solid #333; }
        .sidebar .cerrar a { color: #888; text-decoration: none; font-size: 13px; }
        .sidebar .cerrar a:hover { color: #fff; }
        .contenido { margin-left: 240px; padding: 40px; flex: 1; }
        .cabecera { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .cabecera h1 { font-size: 22px; font-weight: 500; color: #1a1a1a; }
        .btn { padding: 10px 20px; background: #b07d62; color: #fff; border-radius: 8px; text-decoration: none; font-size: 14px; transition: background .2s; }
        .btn:hover { background: #9a6a50; }
        table { width: 100%; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border-collapse: collapse; overflow: hidden; }
        th { text-align: left; padding: 14px 20px; font-size: 13px; color: #888; font-weight: 400; border-bottom: 1px solid #f0f0f0; }
        td { padding: 14px 20px; font-size: 14px; color: #333; border-bottom: 1px solid #f9f9f9; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; }
        .badge.publicado { background: #e8f5e9; color: #2e7d32; }
        .badge.borrador  { background: #f5f5f5; color: #888; }
        .badge.destacado { background: #fff3e0; color: #b07d62; margin-left: 6px; }
        .acciones a { font-size: 13px; color: #b07d62; text-decoration: none; margin-right: 12px; }
        .acciones a:hover { text-decoration: underline; }
        .acciones a.eliminar { color: #c0392b; }
        .vacio { text-align: center; padding: 60px; color: #aaa; font-size: 14px; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">Le Capture</div>
        <nav>
            <a href="/LeCapture_Fotografia/admin/dashboard">Inicio</a>
            <a href="/LeCapture_Fotografia/admin/posts" class="activo">Blog</a>
            <a href="/LeCapture_Fotografia/admin/galeria">Galería</a>
            <a href="/LeCapture_Fotografia/admin/resenas">Reseñas</a>
        </nav>
        <div class="cerrar">
            <a href="/LeCapture_Fotografia/admin/logout">Cerrar sesión</a>
        </div>
    </aside>

    <main class="contenido">
        <div class="cabecera">
            <h1>Posts del blog</h1>
            <a href="/LeCapture_Fotografia/admin/posts/nuevo" class="btn">+ Nuevo post</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
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
                        <td>
                            <span class="badge <?= $post['publicado'] ? 'publicado' : 'borrador' ?>">
                                <?= $post['publicado'] ? 'Publicado' : 'Borrador' ?>
                            </span>
                        </td>
                        <td><?= $post['fecha_publicacion'] ? date('d/m/Y', strtotime($post['fecha_publicacion'])) : '—' ?></td>
                        <td class="acciones">
                            <a href="/LeCapture_Fotografia/admin/posts/editar/<?= $post['id'] ?>">Editar</a>
                            <a href="/LeCapture_Fotografia/admin/posts/eliminar/<?= $post['id'] ?>"
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