<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Iniciar sesión</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            font-family: sans-serif;
        }

        .card {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 380px;
        }

        h1 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #1a1a1a;
        }

        p.sub {
            font-size: 14px;
            color: #888;
            margin-bottom: 28px;
        }

        label {
            display: block;
            font-size: 13px;
            color: #555;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            margin-bottom: 18px;
            outline: none;
            transition: border .2s;
        }

        input:focus { border-color: #b07d62; }

        button {
            width: 100%;
            padding: 12px;
            background: #b07d62;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background .2s;
        }

        button:hover { background: #9a6a50; }

        .error {
            background: #fdecea;
            color: #c0392b;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Panel de administración</h1>
        <p class="sub">Ingresá con tu cuenta</p>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/LeCapture_Fotografia/admin/login">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   required autofocus>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>

        <div style="margin-top: 18px; text-align: center;">
            <a href="/LeCapture_Fotografia/" style="color: #b07d62; text-decoration: none; font-size: 14px;">Volver al home</a>
        </div>
    </div>
</body>
</html>