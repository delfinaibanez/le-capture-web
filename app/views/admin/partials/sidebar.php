<?php
$seccionActiva = $seccionActiva ?? '';
?>
<aside class="sidebar">
    <div class="logo">Le Capture</div>
    <nav>
        <a href="/LeCapture_Fotografia/admin/dashboard" <?= $seccionActiva === 'dashboard' ? 'class="activo"' : '' ?>>Inicio</a>
        <a href="/LeCapture_Fotografia/admin/posts" <?= $seccionActiva === 'posts' ? 'class="activo"' : '' ?>>Blog</a>
        <a href="/LeCapture_Fotografia/admin/galeria" <?= $seccionActiva === 'galeria' ? 'class="activo"' : '' ?>>Galería</a>
        <a href="/LeCapture_Fotografia/admin/resenas" <?= $seccionActiva === 'resenas' ? 'class="activo"' : '' ?>>Reseñas</a>
    </nav>
    <div class="cerrar">
        <a href="/LeCapture_Fotografia/admin/logout">Cerrar sesión</a>
    </div>
</aside>
