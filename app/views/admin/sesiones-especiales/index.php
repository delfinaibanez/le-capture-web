<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones Especiales — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
</head>
<body>
    <?php $seccionActiva = 'sesiones-especiales'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1>Sesiones Especiales</h1>
            <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales/nueva" class="btn">+ Nueva sesión</a>
        </div>

        <?php if (isset($_GET['guardado'])): ?>
            <div class="exito" style="margin-bottom:24px;">Sesión guardada correctamente.</div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Cierre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($sesiones)): ?>
                    <tr><td colspan="5" class="vacio">No hay sesiones especiales todavía.</td></tr>
                <?php else: ?>
                    <?php foreach ($sesiones as $sesion): ?>
                    <tr>
                        <td><?= htmlspecialchars($sesion['nombre']) ?></td>
                        <td><?= htmlspecialchars($sesion['slug']) ?></td>
                        <td><?= $sesion['fecha_cierre'] ? date('d/m/Y', strtotime($sesion['fecha_cierre'])) : '—' ?></td>
                        <td>
                            <span class="badge <?= $sesion['publicada'] ? 'publicado' : 'borrador' ?>">
                                <?= $sesion['publicada'] ? 'Publicada' : 'Borrador' ?>
                            </span>
                        </td>
                        <td class="acciones">
                            <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales/editar/<?= $sesion['id'] ?>">Editar</a>
                            <a href="/leCapture_web/le-capture-web/admin/galeria">Ver fotos</a>
                            <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales/eliminar/<?= $sesion['id'] ?>"
                               class="eliminar"
                               onclick="return confirm('¿Eliminar esta sesión y su categoría de galería?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>