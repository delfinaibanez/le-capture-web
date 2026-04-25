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
            <a href="/LeCapture_Fotografia/admin/galeria/subir" class="btn">+ Subir fotos</a>
        </div>

        <?php if (isset($_GET['subidas'])): ?>
            <div class="exito" style="margin-bottom:24px;">
                Se subieron <?= intval($_GET['subidas']) ?> foto(s) correctamente.
            </div>
        <?php endif; ?>

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
                                <span><?= $foto['destacada'] ? '★ destacada' : '' ?></span>
                                <a href="/LeCapture_Fotografia/admin/galeria/eliminar/<?= $foto['id'] ?>"
                                   onclick="return confirm('¿Eliminar esta foto?')">Eliminar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </main>
</body>
</html>