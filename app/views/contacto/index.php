<?php $paginaActiva = 'contacto'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto — Le Capture</title>
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/main.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/navbar.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/public/css/contacto.css">
    <link rel="stylesheet" href="/leCapture_web/le-capture-web/app/css/home.css">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <!-- HERO -->
    <section class="contacto-hero">
        <img class="contacto-hero__img"
             src="/leCapture_web/le-capture-web/public/img/contacto-hero.jpg"
             alt="Contacto Le Capture">
        <div class="contacto-hero__overlay"></div>
        <div class="contacto-hero__contenido">
            <h1>Pongámonos en contacto</h1>
            <p>Estoy aquí para responder todas tus consultas sobre sesiones fotográficas</p>
        </div>
    </section>
    <!-- INTRO -->
<div class="contacto-intro">
    <p>Si querés solicitar información o reservar una sesión, podés contactarme a través del formulario. El estudio funciona solo con cita previa, para asegurarte un espacio tranquilo y dedicado. Tené en cuenta que las tarifas pueden modificarse sin previo aviso, ¡te recomiendo reservar hoy!</p>
</div>

<!-- INFO + FORMULARIO -->
<div class="contacto-main">

    <!-- TARJETAS INFO -->
    <div class="contacto-info">
        <div class="info-card">
            <div class="info-card__icono">✉</div>
            <div class="info-card__titulo">Email</div>
            <div class="info-card__dato">
                <a href="mailto:hola@lecapturefotografia.com">hola@lecapturefotografia.com</a>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card__icono">📍</div>
            <div class="info-card__titulo">Ubicación</div>
            <div class="info-card__dato">Godoy Cruz<br>Mendoza, Argentina</div>
        </div>
        <div class="info-card">
            <div class="info-card__icono">📷</div>
            <div class="info-card__titulo">Instagram</div>
            <div class="info-card__dato">
                <a href="https://instagram.com/lecapturefotografia" target="_blank">@lecapturefotografia</a>
            </div>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="contacto-form">
        <h2>Enviá tu consulta</h2>

        <?php if (isset($_GET['enviada'])): ?>
            <div class="form-exito">¡Gracias! Tu consulta fue enviada correctamente. Te respondo a la brevedad.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="form-error">Por favor completá todos los campos correctamente.</div>
        <?php endif; ?>

        <form method="POST" action="/leCapture_web/le-capture-web/contacto/enviar">

            <div class="form-grupo">
                <label for="nombre">Nombre <span>*</span></label>
                <input type="text" id="nombre" name="nombre" 
                       placeholder="Tu nombre completo" required>
            </div>

            <div class="form-grupo">
                <label for="email">Email <span>*</span></label>
                <input type="email" id="email" name="email" 
                       placeholder="tu@email.com" required>
            </div>

            <div class="form-grupo">
                <label for="mensaje">Tu consulta <span>*</span></label>
                <textarea id="mensaje" name="mensaje" 
                          placeholder="Contanos sobre la sesión que querés reservar, fecha estimada, cantidad de personas, etc." 
                          required></textarea>
            </div>

            <button type="submit" class="form-submit">Enviar consulta</button>

        </form>
    </div>

</div>

<!-- HORARIOS -->
<div class="contacto-horarios">
    <h2>Horarios de atención</h2>
    <p>
        Lunes a Viernes: 9:00 - 18:00 hs<br>
        Sábados: 10:00 - 14:00 hs<br>
        <em>Solo con cita previa</em>
    </p>
</div>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
    <script src="/leCapture_web/le-capture-web/public/js/navbar.js"></script>
</body>
</html>