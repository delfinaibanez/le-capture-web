<header class="navbar">
    <div class="container navbar__inner">

        <a href="/LeCapture_Fotografia/" class="navbar__logo">
            <img src="/LeCapture_Fotografia/public/img/logo.png" alt="Le Capture Fotografía">
        </a>

        <nav class="navbar__links">
            <a href="/LeCapture_Fotografia/" 
               class="<?= ($paginaActiva ?? '') === 'inicio' ? 'activo' : '' ?>">
               Inicio
            </a>
            <a href="/LeCapture_Fotografia/sobre-mi"
               class="<?= ($paginaActiva ?? '') === 'sobre-mi' ? 'activo' : '' ?>">
               Sobre mí
            </a>
            <a href="/LeCapture_Fotografia/galeria"
               class="<?= ($paginaActiva ?? '') === 'galeria' ? 'activo' : '' ?>">
               Sesiones
            </a>
            <a href="/LeCapture_Fotografia/blog"
               class="<?= ($paginaActiva ?? '') === 'blog' ? 'activo' : '' ?>">
               Blog
            </a>
            <a href="/LeCapture_Fotografia/contacto"
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
        <a href="/LeCapture_Fotografia/">Inicio</a>
        <a href="/LeCapture_Fotografia/sobre-mi">Sobre mí</a>
        <a href="/LeCapture_Fotografia/galeria">Sesiones</a>
        <a href="/LeCapture_Fotografia/blog">Blog</a>
        <a href="/LeCapture_Fotografia/contacto">Contacto</a>
        <a href="https://wa.me/5492615000000" target="_blank" class="btn-primario">WhatsApp</a>
    </nav>
</header>