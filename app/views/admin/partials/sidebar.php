<?php
$seccionActiva = $seccionActiva ?? '';
?>
<aside class="sidebar">
    <div class="logo">Le Capture</div>
    <nav>
        <a href="/leCapture_web/le-capture-web/admin/dashboard" <?= $seccionActiva === 'dashboard' ? 'class="activo"' : '' ?>>Inicio</a>
        <a href="/leCapture_web/le-capture-web/admin/posts" <?= $seccionActiva === 'posts' ? 'class="activo"' : '' ?>>Blog</a>
        <a href="/leCapture_web/le-capture-web/admin/galeria" <?= $seccionActiva === 'galeria' ? 'class="activo"' : '' ?>>Galería</a>
        <a href="/leCapture_web/le-capture-web/admin/resenas" <?= $seccionActiva === 'resenas' ? 'class="activo"' : '' ?>>Reseñas</a>
        <a href="/leCapture_web/le-capture-web/admin/sesiones-especiales"
            class="<?= ($seccionActiva ?? '') === 'sesiones-especiales' ? 'activo' : '' ?>">
                Ses. Especiales
        </a>
    </nav>
    <div class="cerrar">
        <a href="/leCapture_web/le-capture-web/admin/logout">Cerrar sesión</a>
    </div>
</aside>
