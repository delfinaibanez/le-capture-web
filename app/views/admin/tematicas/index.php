<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temáticas — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
</head>
<body>
    <?php $seccionActiva = 'tematicas'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1>Temáticas</h1>
            <a href="/leCapture_web/le-capture-web/admin/tematicas/nueva" class="btn">+ Nueva temática</a>
        </div>

        <?php if (isset($_GET['guardado'])): ?>
            <div class="exito" style="margin-bottom:24px;">Temática guardada correctamente.</div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Orden</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tematicas)): ?>
                    <tr><td colspan="5" class="vacio">No hay temáticas todavía.</td></tr>
                <?php else: ?>
                    <?php foreach ($tematicas as $t): ?>
                    <tr>
                        <td>
                            <?php if ($t['imagen']): ?>
                                <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($t['imagen']) ?>"
                                     style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                            <?php else: ?>
                                <span style="color:#aaa;font-size:12px;">Sin imagen</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($t['nombre']) ?></td>
                        <td><?= $t['orden'] ?></td>
                        <td>
                            <span class="badge <?= $t['activa'] ? 'publicado' : 'borrador' ?>">
                                <?= $t['activa'] ? 'Activa' : 'Inactiva' ?>
                            </span>
                        </td>
                        <td class="acciones">
                            <a href="/leCapture_web/le-capture-web/admin/tematicas/editar/<?= $t['id'] ?>">Editar</a>
                            <a href="/leCapture_web/le-capture-web/admin/tematicas/eliminar/<?= $t['id'] ?>"
                               class="eliminar"
                               onclick="return confirm('¿Eliminar esta temática?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>