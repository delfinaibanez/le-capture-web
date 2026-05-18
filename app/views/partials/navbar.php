<?php
global $navCapitulos, $navTematicas;
?>
<header class="navbar">
    <div class="container navbar__inner">

        <a href="/leCapture_web/le-capture-web/" class="navbar__logo">
            <img src="/leCapture_web/le-capture-web/public/img/logo.png" alt="Le Capture Fotografía">
        </a>

        <nav class="navbar__links">
            <a href="/leCapture_web/le-capture-web/" 
               class="<?= ($paginaActiva ?? '') === 'inicio' ? 'activo' : '' ?>">
               Inicio
            </a>
            <a href="/leCapture_web/le-capture-web/sobre-mi"
               class="<?= ($paginaActiva ?? '') === 'sobre-mi' ? 'activo' : '' ?>">
               Sobre mí
            </a>
            <div class="navbar__dropdown">
                <a href="#" class="navbar__dropdown-trigger <?= ($paginaActiva ?? '') === 'galeria' ? 'activo' : '' ?>">
                    Sesiones ▾
                </a>
                <div class="navbar__dropdown-menu">
                    <?php foreach ($navCapitulos ?? [] as $cat): ?>
                        <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>">
                            <?= htmlspecialchars($cat['nombre']) ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if (!empty($navTematicas)): ?>
                        <div class="navbar__dropdown-separador"></div>
                        <span class="navbar__dropdown-label">Sesiones especiales</span>
                        <?php foreach ($navTematicas as $cat): ?>
                            <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>">
                                <?= htmlspecialchars($cat['nombre']) ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="navbar__dropdown-separador"></div>
                    <a href="/leCapture_web/le-capture-web/tematicas" class="navbar__dropdown-cta">
                        Ver todas las temáticas
                    </a>
                </div>
            </div>
            <a href="/leCapture_web/le-capture-web/blog"
               class="<?= ($paginaActiva ?? '') === 'blog' ? 'activo' : '' ?>">
               Blog
            </a>
            <a href="/leCapture_web/le-capture-web/resenas"
               class="<?= ($paginaActiva ?? '') === 'resenas' ? 'activo' : '' ?>">
               Reseñas
            </a>
            <a href="/leCapture_web/le-capture-web/contacto"
               class="<?= ($paginaActiva ?? '') === 'contacto' ? 'activo' : '' ?>">
               Contacto
            </a>
        </nav>

        <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario navbar__cta">
            WhatsApp
        </a>

        <button class="navbar__hamburguesa" id="hamburguesa" aria-label="Abrir menú">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
            <nav class="navbar__mobile" id="menu-mobile">
                <a href="/leCapture_web/le-capture-web/">Inicio</a>
                <a href="/leCapture_web/le-capture-web/sobre-mi">Sobre mí</a>
                
                <div class="navbar__mobile-dropdown">
                    <button class="navbar__mobile-trigger" id="mobile-sesiones-trigger">
                        Sesiones ▾
                    </button>
                    <div class="navbar__mobile-submenu" id="mobile-sesiones-menu">
                        <?php foreach ($navCapitulos ?? [] as $cat): ?>
                            <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>">
                                <?= htmlspecialchars($cat['nombre']) ?>
                            </a>
                        <?php endforeach; ?>
                        <?php if (!empty($navTematicas)): ?>
                            <div class="navbar__dropdown-separador"></div>
                            <span class="navbar__dropdown-label">Sesiones especiales</span>
                            <?php foreach ($navTematicas as $cat): ?>
                                <a href="/leCapture_web/le-capture-web/galeria/<?= htmlspecialchars($cat['slug']) ?>">
                                    <?= htmlspecialchars($cat['nombre']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="navbar__dropdown-separador"></div>
                        <a href="/leCapture_web/le-capture-web/tematicas" class="navbar__dropdown-cta">Temáticas</a>
                    </div>
                </div>

                <a href="/leCapture_web/le-capture-web/blog">Blog</a>
                <a href="/leCapture_web/le-capture-web/resenas">Reseñas</a>
                <a href="/leCapture_web/le-capture-web/contacto">Contacto</a>
                <a href="https://wa.me/5492615788997" target="_blank" class="btn-primario">WhatsApp</a>
            </nav>
</header>