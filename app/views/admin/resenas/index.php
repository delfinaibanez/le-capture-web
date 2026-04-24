<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas — Le Capture</title>
    <link rel="stylesheet" href="/LeCapture_Fotografia/public/css/admin.css">
</head>
<body>
    <?php $seccionActiva = 'resenas'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1>Reseñas</h1>
        </div>

        <!-- PENDIENTES -->
        <h2 style="font-size:16px;font-weight:500;color:#1a1a1a;margin-bottom:16px;">
            Pendientes de aprobación
            <?php if (!empty($pendientes)): ?>
                <span class="badge pendiente" style="margin-left:8px;"><?= count($pendientes) ?></span>
            <?php endif; ?>
        </h2>

        <table style="margin-bottom:40px;">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Comentario</th>
                    <th>Estrellas</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pendientes)): ?>
                    <tr><td colspan="5" class="vacio">No hay reseñas pendientes.</td></tr>
                <?php else: ?>
                    <?php foreach ($pendientes as $resena): ?>
                    <tr>
                        <td><?= htmlspecialchars($resena['nombre_cliente']) ?></td>
                        <td><?= htmlspecialchars($resena['comentario']) ?></td>
                        <td><?= str_repeat('★', $resena['estrellas']) ?><?= str_repeat('☆', 5 - $resena['estrellas']) ?></td>
                        <td><?= date('d/m/Y', strtotime($resena['created_at'])) ?></td>
                        <td class="acciones">
                            <a href="/LeCapture_Fotografia/admin/resenas/aprobar/<?= $resena['id'] ?>">Aprobar</a>
                            <a href="/LeCapture_Fotografia/admin/resenas/eliminar/<?= $resena['id'] ?>"
                               class="eliminar"
                               onclick="return confirm('¿Eliminar esta reseña?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- APROBADAS -->
        <h2 style="font-size:16px;font-weight:500;color:#1a1a1a;margin-bottom:16px;">Aprobadas</h2>

        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Comentario</th>
                    <th>Estrellas</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($aprobadas)): ?>
                    <tr><td colspan="5" class="vacio">No hay reseñas aprobadas todavía.</td></tr>
                <?php else: ?>
                    <?php foreach ($aprobadas as $resena): ?>
                    <tr>
                        <td><?= htmlspecialchars($resena['nombre_cliente']) ?></td>
                        <td><?= htmlspecialchars($resena['comentario']) ?></td>
                        <td><?= str_repeat('★', $resena['estrellas']) ?><?= str_repeat('☆', 5 - $resena['estrellas']) ?></td>
                        <td><?= date('d/m/Y', strtotime($resena['created_at'])) ?></td>
                        <td class="acciones">
                            <a href="/LeCapture_Fotografia/admin/resenas/eliminar/<?= $resena['id'] ?>"
                               class="eliminar"
                               onclick="return confirm('¿Eliminar esta reseña?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>