<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería — Le Capture</title>
    <link rel="stylesheet" href="/LeCapture_Fotografia/public/css/admin/admin.css">
    <style>
        .grid-fotos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 16px;
            margin-bottom: 40px;
        }
        .foto-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .foto-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            display: block;
        }
        .foto-card .foto-info {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .foto-card .foto-info span {
            font-size: 11px;
            color: #888;
        }
        .foto-card .foto-info a {
            font-size: 12px;
            color: #c0392b;
            text-decoration: none;
        }
        .foto-card .foto-info a:hover { text-decoration: underline; }
        .categoria-titulo {
            font-size: 16px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid #b07d62;
        }
        .sin-fotos {
            color: #aaa;
            font-size: 14px;
            margin-bottom: 32px;
        }
    </style>
</head>
<body>
    <?php $seccionActiva = 'galeria'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1>Galería</h1>
            <div>
                <a href="/LeCapture_Fotografia/admin/galeria/subir" class="btn">+ Subir fotos</a>
            </div>
        </div>

        <?php if (isset($_GET['subidas'])): ?>
            <div class="exito" style="margin-bottom:24px;">
                Se subieron <?= intval($_GET['subidas']) ?> foto(s) correctamente.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['guardado'])): ?>
            <div class="exito" style="margin-bottom:24px;">
                Configuración de galería guardada correctamente.
            </div>
        <?php endif; ?>

        <form method="POST" action="/LeCapture_Fotografia/admin/galeria/actualizar">
            <div class="config-panel" style="margin-bottom:24px; padding:18px 20px; background:#fff; border-radius:16px; box-shadow:0 12px 30px rgba(0,0,0,0.06);">
                <label for="max_mostrar" style="display:block; font-size:14px; margin-bottom:8px; color:#555;">Cantidad de fotos que se mostrarán en momentos captados</label>
                <input type="number" id="max_mostrar" name="max_mostrar" value="<?= htmlspecialchars($config['maxFotos'] ?? 6) ?>" min="1" max="10" style="width:100px; padding:10px 12px; border:1px solid #ddd; border-radius:8px;" />
                <p style="font-size:13px; color:#777; margin-top:10px;">Seleccioná las fotos que querés mostrar en la grilla principal de la página de inicio. Máximo 10 fotos.</p>
            </div>
            <?php foreach ($categorias as $cat): ?>
                <div class="categoria-titulo"><?= htmlspecialchars($cat['nombre']) ?></div>

            <?php $fotos = $fotosPorCategoria[$cat['id']] ?? []; ?>

            <?php if (empty($fotos)): ?>
                <p class="sin-fotos">No hay fotos en esta categoría todavía.</p>
            <?php else: ?>
                <div class="grid-fotos">
                    <?php foreach ($fotos as $foto): ?>
                        <div class="foto-card">
                            <img src="/LeCapture_Fotografia/uploads/<?= htmlspecialchars($foto['ruta']) ?>" 
                                 alt="<?= htmlspecialchars($foto['descripcion'] ?? '') ?>">
                            <div class="foto-info">
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:#555;">
                                    <input type="checkbox" name="fotos_visible[]" value="<?= $foto['id'] ?>"
                                           <?= in_array($foto['id'], $config['visible'] ?? [], true) ? 'checked' : '' ?> />
                                    Mostrar en inicio
                                </label>
                                <a href="/LeCapture_Fotografia/admin/galeria/eliminar/<?= $foto['id'] ?>"
                                   onclick="return confirm('¿Eliminar esta foto?')">Eliminar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

            <div style="margin-top:20px; text-align:right;">
                <button type="submit" class="btn">Guardar visibilidad</button>
            </div>
        </form>

    </main>
</body>
</html>