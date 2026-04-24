<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($post) ? 'Editar post' : 'Nuevo post' ?> — Le Capture</title>
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
        .volver { font-size: 14px; color: #888; text-decoration: none; }
        .volver:hover { color: #b07d62; }
        .card { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        label { display: block; font-size: 13px; color: #555; margin-bottom: 6px; margin-top: 20px; }
        label:first-child { margin-top: 0; }
        input[type=text], textarea { width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; font-family: sans-serif; outline: none; transition: border .2s; }
        input[type=text]:focus, textarea:focus { border-color: #b07d62; }
        textarea { min-height: 280px; resize: vertical; line-height: 1.6; }
        input[type=file] { font-size: 14px; color: #555; }
        .preview { margin-top: 10px; }
        .preview img { max-width: 200px; border-radius: 8px; border: 1px solid #eee; }
        .checks { display: flex; gap: 24px; margin-top: 20px; }
        .checks label { display: flex; align-items: center; gap-8px; gap: 8px; font-size: 14px; color: #333; margin: 0; cursor: pointer; }
        .error { background: #fdecea; color: #c0392b; padding: 10px 14px; border-radius: 8px; font-size: 13px; margin-bottom: 20px; }
        .acciones { display: flex; gap: 12px; margin-top: 28px; }
        .btn { padding: 10px 24px; background: #b07d62; color: #fff; border: none; border-radius: 8px; font-size: 15px; cursor: pointer; transition: background .2s; text-decoration: none; }
        .btn:hover { background: #9a6a50; }
        .btn-secundario { background: #f5f5f5; color: #555; }
        .btn-secundario:hover { background: #eee; }
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
            <h1><?= isset($post) ? 'Editar post' : 'Nuevo post' ?></h1>
            <a href="/LeCapture_Fotografia/admin/posts" class="volver">← Volver</a>
        </div>

        <div class="card">
            <?php if (!empty($error)): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php
                $action = isset($post)
                    ? '/LeCapture_Fotografia/admin/posts/actualizar/' . $post['id']
                    : '/LeCapture_Fotografia/admin/posts/guardar';
            ?>

            <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo"
                       value="<?= htmlspecialchars($post['titulo'] ?? '') ?>" required>

                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" required><?= htmlspecialchars($post['contenido'] ?? '') ?></textarea>

                <label for="imagen">Imagen de portada</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png,image/webp">
                <?php if (!empty($post['imagen_portada'])): ?>
                    <div class="preview">
                        <img src="/LeCapture_Fotografia/uploads/<?= htmlspecialchars($post['imagen_portada']) ?>" alt="Portada actual" style="max-width:200px;border-radius:8px;">
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
                    <a href="/LeCapture_Fotografia/admin/posts" class="btn btn-secundario">Cancelar</a>
                </div>

            </form>
        </div>
    </main>
</body>
</html>