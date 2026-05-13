<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($sesion) ? 'Editar sesión' : 'Nueva sesión especial' ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
    <style>
        .form-seccion { border: 1px solid #eee; border-radius: 10px; padding: 24px; margin-bottom: 24px; background: #fff; }
        .form-seccion h3 { font-size: 14px; font-weight: 600; color: #555; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #f0f0f0; }
        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-grid-4 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .preview img { max-width: 200px; border-radius: 8px; margin-top: 10px; border: 1px solid #ddd; }
        .punto-especial { background: #fcfcfc; border: 1px solid #f0f0f0; padding: 12px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: 500; }
        input[type="text"], input[type="date"], input[type="number"], textarea { margin-bottom: 15px; }
    </style>
</head>
<body>
    <?php $seccionActiva = 'sesiones-especiales'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1><?= isset($sesion) ? 'Editar sesión especial' : 'Nueva sesión especial' ?></h1>
            <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales" class="volver">← Volver</a>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php
            $action = isset($sesion)
                ? '/leCapture_web/le-capture-web/admin/sesiones-especiales/actualizar/' . $sesion['id']
                : '/leCapture_web/le-capture-web/admin/sesiones-especiales/guardar';
        ?>

       <form method="POST" action="<?= $action ?>" enctype="multipart/form-data">

            <div class="card form-seccion">
                <h3>📋 Información principal</h3>

                <label>Nombre de la sesión</label>
                <input type="text" name="nombre" 
                       value="<?= htmlspecialchars($sesion['nombre'] ?? '') ?>" 
                       placeholder="Ej: Navidad 2026" required>

                <label>Subtítulo</label>
                <input type="text" name="subtitulo" 
                       value="<?= htmlspecialchars($sesion['subtitulo'] ?? '') ?>" 
                       placeholder="Ej: Una sesión que no se repite">

                <label>Descripción principal</label>
                <textarea name="descripcion" style="min-height:100px;"><?= htmlspecialchars($sesion['descripcion'] ?? '') ?></textarea>

                <label>Imagen de fondo del hero (Banner)</label>
                <input type="file" name="imagen_hero" accept="image/*">
                <?php if (!empty($sesion['imagen_hero'])): ?>
                    <div class="preview">
                        <img src="/leCapture_web/le-capture-web/uploads/<?= htmlspecialchars($sesion['imagen_hero']) ?>">
                        <p style="font-size:12px;color:#888;">Imagen actual</p>
                    </div>
                <?php endif; ?>

                <label style="margin-top:15px;">Color principal de la página</label>
                <div style="display:flex;gap:12px;align-items:center;">
                    <input type="color" name="color_primario" 
                           value="<?= htmlspecialchars($sesion['color_primario'] ?? '#1a2e1a') ?>" 
                           style="width:60px;height:40px;border:none;cursor:pointer;">
                    <span style="font-size:13px;color:#888;">Este color se usará en botones y fondos.</span>
                </div>
            </div>

            <div class="card form-seccion">
                <h3>⭐ ¿Por qué es especial? (4 puntos)</h3>
                <div class="form-grid-4">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="punto-especial">
                            <label>Punto <?= $i ?> - Título</label>
                            <input type="text" name="por_que_titulo_<?= $i ?>" 
                                   value="<?= htmlspecialchars($sesion["por_que_titulo_$i"] ?? '') ?>" 
                                   placeholder="Ej: Escenografía única">
                            <label>Punto <?= $i ?> - Descripción</label>
                            <input type="text" name="por_que_desc_<?= $i ?>" 
                                   value="<?= htmlspecialchars($sesion["por_que_desc_$i"] ?? '') ?>" 
                                   placeholder="Ej: Diseñada exclusivamente para esta fecha">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="card form-seccion">
                <h3>📅 Fechas y cupos</h3>
                <div class="form-grid-2">
                    <div>
                        <label>Apertura de reservas</label>
                        <input type="date" name="fecha_apertura" value="<?= htmlspecialchars($sesion['fecha_apertura'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Cierre de reservas</label>
                        <input type="date" name="fecha_cierre" value="<?= htmlspecialchars($sesion['fecha_cierre'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Cupos totales</label>
                        <input type="number" name="cupos_totales" value="<?= htmlspecialchars($sesion['cupos_totales'] ?? '0') ?>">
                    </div>
                    <div>
                        <label>Cupos ocupados</label>
                        <input type="number" name="cupos_ocupados" value="<?= htmlspecialchars($sesion['cupos_ocupados'] ?? '0') ?>">
                    </div>
                </div>
            </div>

            <div class="card form-seccion">
                <h3>🎬 Video behind the scenes</h3>
                <label>Link del video (YouTube o Vimeo)</label>
                <input type="text" name="video_url" 
                       value="<?= htmlspecialchars($sesion['video_url'] ?? '') ?>" 
                       placeholder="https://youtube.com/watch?v=...">
            </div>

            <div class="card form-seccion">
                <h3>💰 Packs de fotografía</h3>
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div style="border:1px solid #f0f0f0; border-radius:8px; padding:16px; margin-bottom:16px; background:#fafafa;">
                        <div style="display:flex;justify-content:space-between; margin-bottom:10px;">
                            <strong>Pack <?= $i ?></strong>
                            <?php if ($i === 2): ?>
                                <label style="font-size:12px;"><input type="checkbox" name="pack2_destacado" value="1" <?= !empty($sesion['pack2_destacado']) ? 'checked' : '' ?>> Destacar</label>
                            <?php endif; ?>
                        </div>
                        <div class="form-grid-2">
                            <input type="text" name="pack<?= $i ?>_nombre" value="<?= htmlspecialchars($sesion["pack{$i}_nombre"] ?? '') ?>" placeholder="Nombre (Ej: Pack Esencial)">
                            <input type="text" name="pack<?= $i ?>_precio" value="<?= htmlspecialchars($sesion["pack{$i}_precio"] ?? '') ?>" placeholder="Precio (Ej: $12.000)">
                        </div>
                        <label>Items (uno por línea)</label>
                        <textarea name="pack<?= $i ?>_items" placeholder="Ej: 15 fotos editadas&#10;1 hora de sesión" style="margin-top:5px; min-height:80px;"><?= htmlspecialchars($sesion["pack{$i}_items"] ?? '') ?></textarea>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="card form-seccion">
                <h3>❓ Preguntas Frecuentes (FAQ)</h3>
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div style="margin-bottom: 20px;">
                        <label>Pregunta <?= $i ?></label>
                        <input type="text" name="faq<?= $i ?>_pregunta" value="<?= htmlspecialchars($sesion["faq{$i}_pregunta"] ?? '') ?>" placeholder="Ej: ¿Cuándo recibo las fotos?">
                        <label>Respuesta <?= $i ?></label>
                        <textarea name="faq<?= $i ?>_respuesta" style="min-height: 70px;"><?= htmlspecialchars($sesion["faq{$i}_respuesta"] ?? '') ?></textarea>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="card form-seccion">
                <h3>🎯 Finalizar</h3>
                <label>Enunciado final (Título de contacto)</label>
                <input type="text" name="cta_texto" value="<?= htmlspecialchars($sesion['cta_texto'] ?? '¿Querés sumarte a la sesión?') ?>" placeholder="Ej: ¿Querés sumarte a la sesión?">
                
                <div style="margin-top:15px;">
                    <label><input type="checkbox" name="publicada" value="1" <?= !empty($sesion['publicada']) ? 'checked' : '' ?>> Publicar sesión ahora</label>
                </div>
            </div>

            <div class="acciones-form">
                <button type="submit" class="btn">Guardar Cambios</button>
                <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>