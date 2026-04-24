<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel — Le Capture</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: #1a1a1a;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 32px 0;
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
        }

        .sidebar .logo {
            font-size: 18px;
            font-weight: 500;
            padding: 0 24px 32px;
            border-bottom: 1px solid #333;
            color: #b07d62;
        }

        .sidebar nav {
            padding: 24px 0;
            flex: 1;
        }

        .sidebar nav a {
            display: block;
            padding: 12px 24px;
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
            transition: all .2s;
        }

        .sidebar nav a:hover,
        .sidebar nav a.activo {
            color: #fff;
            background: #2a2a2a;
            border-left: 3px solid #b07d62;
        }

        .sidebar .cerrar {
            padding: 24px;
            border-top: 1px solid #333;
        }

        .sidebar .cerrar a {
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }

        .sidebar .cerrar a:hover { color: #fff; }

        /* CONTENIDO */
        .contenido {
            margin-left: 240px;
            padding: 40px;
            flex: 1;
        }

        .bienvenida {
            margin-bottom: 32px;
        }

        .bienvenida h1 {
            font-size: 24px;
            font-weight: 500;
            color: #1a1a1a;
        }

        .bienvenida p {
            color: #888;
            font-size: 14px;
            margin-top: 6px;
        }

        /* TARJETAS */
        .tarjetas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .tarjeta {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .tarjeta .numero {
            font-size: 32px;
            font-weight: 500;
            color: #b07d62;
        }

        .tarjeta .etiqueta {
            font-size: 13px;
            color: #888;
            margin-top: 6px;
        }

        /* ACCESOS RÁPIDOS */
        .accesos h2 {
            font-size: 16px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        .accesos .botones {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .accesos .botones a {
            padding: 10px 20px;
            background: #1a1a1a;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: background .2s;
        }

        .accesos .botones a:hover { background: #b07d62; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="logo">Le Capture</div>
        <nav>
            <a href="/LeCapture_Fotografia/admin/dashboard" class="activo">Inicio</a>
            <a href="/LeCapture_Fotografia/admin/posts">Blog</a>
            <a href="/LeCapture_Fotografia/admin/galeria">Galería</a>
            <a href="/LeCapture_Fotografia/admin/resenas">Reseñas</a>
        </nav>
        <div class="cerrar">
            <a href="/LeCapture_Fotografia/admin/logout">Cerrar sesión</a>
        </div>
    </aside>

    <main class="contenido">
        <div class="bienvenida">
           <h1>Hola, <?= htmlspecialchars($nombre ?? 'Admin') ?> 👋</h1> 
            <p>Desde acá podés gestionar todo el contenido de tu página.</p>
        </div>

        <div class="tarjetas">
            <div class="tarjeta">
                <div class="numero" id="total-posts">—</div>
                <div class="etiqueta">Posts publicados</div>
            </div>
            <div class="tarjeta">
                <div class="numero" id="total-resenas">—</div>
                <div class="etiqueta">Reseñas pendientes</div>
            </div>
            <div class="tarjeta">
                <div class="numero" id="total-consultas">—</div>
                <div class="etiqueta">Consultas nuevas</div>
            </div>
            <div class="tarjeta">
                <div class="numero" id="total-fotos">—</div>
                <div class="etiqueta">Fotos en galería</div>
            </div>
        </div>

        <div class="accesos">
            <h2>Accesos rápidos</h2>
            <div class="botones">
                <a href="/LeCapture_Fotografia/admin/posts/nuevo">Nuevo post</a>
                <a href="/LeCapture_Fotografia/admin/galeria/subir">Subir fotos</a>
                <a href="/LeCapture_Fotografia/admin/resenas">Ver reseñas</a>
            </div>
        </div>
    </main>

</body>
</html>