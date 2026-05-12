<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($sesion) ? 'Editar sesión' : 'Nueva sesión especial' ?> — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/admin/admin.css">
    <style>
        .form-seccion {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 24px;
            margin-bottom: 24px;
        }
        .form-seccion h3 {
            font-size: 14px;
            font-weight: 600;
            color: #555;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .form-grid-4 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
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

        <form method="POST" action="<?= $action ?>">

            <!-- INFORMACIÓN PRINCIPAL -->
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
                <textarea name="descripcion"><?= htmlspecialchars($sesion['descripcion'] ?? '') ?></textarea>

                <label>Color principal de la página</label>
                <div style="display:flex;gap:12px;align-items:center;margin-top:6px;">
                    <input type="color" name="color_primario"
                           value="<?= htmlspecialchars($sesion['color_primario'] ?? '#1a2e1a') ?>"
                           style="width:60px;height:40px;border:none;cursor:pointer;">
                    <span style="font-size:13px;color:#888;">Color de fondo del header y CTA</span>
                </div>
            </div>

            <!-- FECHAS Y CUPOS -->
            <div class="card form-seccion">
                <h3>📅 Fechas y cupos</h3>
                <div class="form-grid-2">
                    <div>
                        <label>Apertura de reservas</label>
                        <input type="date" name="fecha_apertura"
                               value="<?= htmlspecialchars($sesion['fecha_apertura'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Cierre de reservas</label>
                        <input type="date" name="fecha_cierre"
                               value="<?= htmlspecialchars($sesion['fecha_cierre'] ?? '') ?>">
                    </div>
                    <div>
                        <label>Cupos totales</label>
                        <input type="number" name="cupos_totales" min="0"
                               value="<?= htmlspecialchars($sesion['cupos_totales'] ?? '0') ?>">
                    </div>
                    <div>
                        <label>Cupos ocupados</label>
                        <input type="number" name="cupos_ocupados" min="0"
                               value="<?= htmlspecialchars($sesion['cupos_ocupados'] ?? '0') ?>">
                    </div>
                </div>
            </div>

            <!-- VIDEO -->
            <div class="card form-seccion">
                <h3>🎬 Video behind the scenes</h3>
                <label>Link del video (YouTube o Vimeo)</label>
                <input type="text" name="video_url"
                       value="<?= htmlspecialchars($sesion['video_url'] ?? '') ?>"
                       placeholder="https://youtube.com/watch?v=...">
                <p style="font-size:12px;color:#aaa;margin-top:6px;">Se muestra en la sección "Así se vive" de la página</p>
            </div>

            <!-- POR QUÉ ES ESPECIAL -->
            <div class="card form-seccion">
                <h3>⭐ ¿Por qué es especial? (4 puntos)</h3>
                <div class="form-grid-4">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div>
                            <label>Punto <?= $i ?> — título</label>
                            <input type="text" name="por_que_titulo_<?= $i ?>"
                                   value="<?= htmlspecialchars($sesion["por_que_titulo_$i"] ?? '') ?>"
                                   placeholder="Ej: Fecha única">
                            <label style="margin-top:8px;">Punto <?= $i ?> — descripción</label>
                            <input type="text" name="por_que_desc_<?= $i ?>"
                                   value="<?= htmlspecialchars($sesion["por_que_desc_$i"] ?? '') ?>"
                                   placeholder="Ej: Solo en diciembre">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- PACKS -->
            <div class="card form-seccion">
                <h3>💰 Packs de fotografía</h3>
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div style="border:1px solid #f0f0f0;border-radius:8px;padding:16px;margin-bottom:16px;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                            <strong style="font-size:13px;color:#555;">Pack <?= $i ?></strong>
                            <?php if ($i === 2): ?>
                                <label style="margin:0;display:flex;align-items:center;gap:6px;font-size:13px;">
                                    <input type="checkbox" name="pack2_destacado" value="1"
                                           <?= !empty($sesion['pack2_destacado']) ? 'checked' : '' ?>>
                                    Marcar como más elegido
                                </label>
                            <?php endif; ?>
                        </div>
                        <div class="form-grid-2">
                            <div>
                                <label>Nombre</label>
                                <input type="text" name="pack<?= $i ?>_nombre"
                                       value="<?= htmlspecialchars($sesion["pack{$i}_nombre"] ?? '') ?>"
                                       placeholder="Ej: Pack Esencial">
                            </div>
                            <div>
                                <label>Precio</label>
                                <input type="text" name="pack<?= $i ?>_precio"
                                       value="<?= htmlspecialchars($sesion["pack{$i}_precio"] ?? '') ?>"
                                       placeholder="Ej: $120.000">
                            </div>
                        </div>
                        <label>Descripción corta</label>
                        <input type="text" name="pack<?= $i ?>_descripcion"
                               value="<?= htmlspecialchars($sesion["pack{$i}_descripcion"] ?? '') ?>"
                               placeholder="Ej: Para capturar los momentos esenciales">
                        <label>Items incluidos (uno por línea)</label>
                        <textarea name="pack<?= $i ?>_items" style="min-height:100px;"><?= htmlspecialchars($sesion["pack{$i}_items"] ?? '') ?></textarea>
                    </div>
                <?php endfor; ?>
            </div>

            <!-- FAQ -->
            <div class="card form-seccion">
                <h3>❓ Preguntas frecuentes</h3>
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div style="margin-bottom:16px;">
                        <label>Pregunta <?= $i ?></label>
                        <input type="text" name="faq<?= $i ?>_pregunta"
                               value="<?= htmlspecialchars($sesion["faq{$i}_pregunta"] ?? '') ?>"
                               placeholder="Ej: ¿Cuándo se realizan las sesiones?">
                        <label style="margin-top:8px;">Respuesta <?= $i ?></label>
                        <textarea name="faq<?= $i ?>_respuesta" style="min-height:80px;"><?= htmlspecialchars($sesion["faq{$i}_respuesta"] ?? '') ?></textarea>
                    </div>
                <?php endfor; ?>
            </div>

            <!-- CTA Y ESTADO -->
            <div class="card form-seccion">
                <h3>🎯 CTA y estado</h3>
                <label>Texto del CTA final</label>
                <input type="text" name="cta_texto"
                       value="<?= htmlspecialchars($sesion['cta_texto'] ?? '') ?>"
                       placeholder="Ej: ¿Lista para tu Navidad?">

                <?php if (isset($sesion) && $sesion['categoria_id']): ?>
                    <div style="margin-top:16px;padding:14px;background:#f5f5f5;border-radius:8px;font-size:13px;color:#888;">
                        📷 Para subir fotos andá a
                        <a href="/leCapture_web/le-capture-web/admin/galeria/subir" style="color:#b07d62;">Galería → Subir fotos</a>
                        y seleccioná "<?= htmlspecialchars($sesion['nombre'] ?? '') ?>".
                    </div>
                <?php endif; ?>

                <div class="checks" style="margin-top:20px;">
                    <label>
                        <input type="checkbox" name="publicada" value="1"
                               <?= !empty($sesion['publicada']) ? 'checked' : '' ?>>
                        Publicar sesión
                    </label>
                </div>
            </div>

            <div class="acciones-form">
                <button type="submit" class="btn">Guardar</button>
                <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales" class="btn btn-secundario">Cancelar</a>
            </div>

        </form>
    </main>
</body>
</html>