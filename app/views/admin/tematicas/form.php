<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tematica) ? 'Editar temática' : 'Nueva temática' ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
</head>
<body>
    <?php $seccionActiva = 'tematicas'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1><?= isset($tematica) ? 'Editar temática' : 'Nueva temática' ?></h1>
            <a href="/leCapture_web/le-capture-web/admin/tematicas" class="volver">← Volver</a>
        </div>

        <div class="card">
            <?php if (!empty($error)): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php
                $action = isset($tematica)
                    ? '/leCapture_web/le-capture-web/admin/tematicas/actualizar/' . $tematica['id']
                    : '/leCapture_web/le-capture-web/admin/tematicas/guardar';
            ?>

            <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">

                <label>Nombre de la temática</label>
                <input type="text" name="nombre"
                       value="<?= htmlspecialchars($tematica['nombre'] ?? '') ?>"
                       placeholder="Ej: Superhéroes" required>

                <label>Imagen de fondo</label>
                <input type="file" name="imagen" accept="image/jpeg,image/png,image/webp">
                <?php if (!empty($tematica['imagen'])): ?>
                    <div style="margin-top:10px;">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($tematica['imagen']) ?>"
                             style="max-width:200px;border-radius:8px;">
                    </div>
                <?php endif; ?>

                <label>Orden</label>
                <input type="number" name="orden" min="0"
                       value="<?= htmlspecialchars($tematica['orden'] ?? '0') ?>">

                <div class="checks" style="margin-top:20px;">
                    <label>
                        <input type="checkbox" name="activa" value="1"
                               <?= !empty($tematica['activa']) ? 'checked' : '' ?>>
                        Mostrar en la página
                    </label>
                </div>

                <div class="acciones-form">
                    <button type="submit" class="btn">Guardar</button>
                    <a href="/leCapture_web/le-capture-web/admin/tematicas" class="btn btn-secundario">Cancelar</a>
                </div>

            </form>
        </div>
    </main>
</body>
</html>