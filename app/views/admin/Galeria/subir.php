<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir fotos — Le Capture</title>
    <link rel="stylesheet" href="/LeCapture_Fotografia/public/css/admin.css">
</head>
<body>
    <?php $seccionActiva = 'galeria'; require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="contenido">
        <div class="cabecera">
            <h1>Subir fotos</h1>
            <a href="/LeCapture_Fotografia/admin/galeria" class="volver">← Volver</a>
        </div>

        <div class="card">
            <?php if (!empty($error)): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="/LeCapture_Fotografia/admin/galeria/guardar" enctype="multipart/form-data">

                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id" required>
                    <option value="">Seleccioná una categoría</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['id'] ?>"
                            <?= (isset($_POST['categoria_id']) && $_POST['categoria_id'] == $cat['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="fotos">Fotos</label>
                <input type="file" id="fotos" name="fotos[]" 
                       accept="image/jpeg,image/png,image/webp" 
                       multiple required>
                <p style="font-size:12px;color:#888;margin-top:6px;">
                    Podés seleccionar varias fotos a la vez. Máximo 5MB por foto. Formatos: JPG, PNG, WEBP.
                </p>

                <div id="preview-container" style="display:flex;flex-wrap:wrap;gap:12px;margin-top:16px;"></div>

                <label for="descripcion">Descripción (opcional)</label>
                <input type="text" id="descripcion" name="descripcion" 
                       value="<?= htmlspecialchars($_POST['descripcion'] ?? '') ?>">

                <div class="checks">
                    <label>
                        <input type="checkbox" name="destacada" value="1">
                        Marcar como destacada
                    </label>
                </div>

                <div class="acciones-form">
                    <button type="submit" class="btn">Subir fotos</button>
                    <a href="/LeCapture_Fotografia/admin/galeria" class="btn btn-secundario">Cancelar</a>
                </div>

            </form>
        </div>
    </main>

    <script>
        // Preview de imágenes antes de subir
        document.getElementById('fotos').addEventListener('change', function() {
            const container = document.getElementById('preview-container');
            container.innerHTML = '';

            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.style.cssText = 'text-align:center;';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.cssText = 'width:120px;height:120px;object-fit:cover;border-radius:8px;border:1px solid #eee;';

                    const nombre = document.createElement('p');
                    nombre.textContent = file.name.length > 15 ? file.name.substring(0, 15) + '...' : file.name;
                    nombre.style.cssText = 'font-size:11px;color:#888;margin-top:4px;';

                    div.appendChild(img);
                    div.appendChild(nombre);
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>