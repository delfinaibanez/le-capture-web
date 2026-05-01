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
            <a href="/leCapture_web/le-capture-web/galeria"
               class="<?= ($paginaActiva ?? '') === 'galeria' ? 'activo' : '' ?>">
               Sesiones
            </a>
            <a href="/leCapture_web/le-capture-web/blog"
               class="<?= ($paginaActiva ?? '') === 'blog' ? 'activo' : '' ?>">
               Blog
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
        <a href="/leCapture_web/le-capture-web/galeria">Sesiones</a>
        <a href="/leCapture_web/le-capture-web/blog">Blog</a>
        <a href="/leCapture_web/le-capture-web/contacto">Contacto</a>
        <a href="https://wa.me/5492615000000" target="_blank" class="btn-primario">WhatsApp</a>
    </nav>
</header>