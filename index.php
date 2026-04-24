<?php
session_start();

require_once __DIR__ . '/config/Conexion.php';

// Limpiar y separar la URL
$url = trim($_GET['url'] ?? $_SERVER['REQUEST_URI'] ?? '', '/');
$url = preg_replace('#^/?LeCapture_Fotografia/?#', '', $url);
$url = trim($url, '/');
$partes = explode('/', $url);

$controlador = $partes[0] ?? '';
$accion      = $partes[1] ?? '';

// ─────────────────────────────────────────
// RUTAS PÚBLICAS
// ─────────────────────────────────────────
if ($controlador === '' || $controlador === 'inicio') {
    require_once __DIR__ . '/app/controllers/InicioController.php';
    $c = new InicioController();
    $c->index();

} elseif ($controlador === 'galeria') {
    require_once __DIR__ . '/app/controllers/GaleriaController.php';
    $c = new GaleriaController();
    $slug = $partes[1] ?? '';
    $slug ? $c->categoria($slug) : $c->index();

} elseif ($controlador === 'blog') {
    require_once __DIR__ . '/app/controllers/BlogController.php';
    $c = new BlogController();
    $slug = $partes[1] ?? '';
    $slug ? $c->post($slug) : $c->index();

} elseif ($controlador === 'resenas') {
    require_once __DIR__ . '/app/controllers/ResenaController.php';
    $c = new ResenaController();
    $accion === 'guardar' ? $c->guardar() : $c->index();

} elseif ($controlador === 'contacto') {
    require_once __DIR__ . '/app/controllers/ContactoController.php';
    $c = new ContactoController();
    $accion === 'enviar' ? $c->enviar() : $c->index();

// ─────────────────────────────────────────
// RUTAS DEL ADMIN
// ─────────────────────────────────────────
} elseif ($controlador === 'admin') {

    require_once __DIR__ . '/app/controllers/AdminController.php';

    if ($accion === 'login') {
        $c = new AdminController();
        $_SERVER['REQUEST_METHOD'] === 'POST' ? $c->login() : $c->loginForm();

    } elseif ($accion === 'logout') {
        $c = new AdminController();
        $c->logout();

    } elseif ($accion === 'dashboard' || $accion === '') {
        AdminController::verificarSesion();
        require_once __DIR__ . '/app/controllers/DashboardController.php';
        $c = new DashboardController();
        $c->index();

    } elseif ($accion === 'posts') {
        AdminController::verificarSesion();
        require_once __DIR__ . '/app/controllers/PostAdminController.php';
        $c = new PostAdminController();
        $sub = $partes[2] ?? '';
        if ($sub === 'nuevo')          $c->nuevo();
        elseif ($sub === 'guardar')    $c->guardar();
        elseif ($sub === 'editar')     $c->editar($partes[3] ?? null);
        elseif ($sub === 'actualizar') $c->actualizar($partes[3] ?? null);
        elseif ($sub === 'eliminar')   $c->eliminar($partes[3] ?? null);
        else                           $c->index();

    } elseif ($accion === 'resenas') {
        AdminController::verificarSesion();
        require_once __DIR__ . '/app/controllers/ResenaController.php';
        $c = new ResenaAdminController();
        $sub = $partes[2] ?? '';
        if ($sub === 'aprobar')        $c->aprobar($partes[3] ?? null);
        elseif ($sub === 'eliminar')   $c->eliminar($partes[3] ?? null);
        else                           $c->index();

    } elseif ($accion === 'galeria') {
        AdminController::verificarSesion();
        require_once __DIR__ . '/app/controllers/GaleriaAdminController.php';
        $c = new GaleriaAdminController();
        $sub = $partes[2] ?? '';
        if ($sub === 'subir')          $c->subir();
        elseif ($sub === 'guardar')    $c->guardar();
        elseif ($sub === 'eliminar')   $c->eliminar($partes[3] ?? null);
        else                           $c->index();

    } elseif ($accion === 'navbar') {
        AdminController::verificarSesion();
        require_once __DIR__ . '/app/controllers/NavbarAdminController.php';
        $c = new NavbarAdminController();
        $sub = $partes[2] ?? '';
        if ($sub === 'guardar')        $c->guardar();
        elseif ($sub === 'eliminar')   $c->eliminar($partes[3] ?? null);
        else                           $c->index();

    } else {
        http_response_code(404);
        echo '404 — Página no encontrada';
    }

// ─────────────────────────────────────────
// 404
// ─────────────────────────────────────────
} else {
    http_response_code(404);
    echo '404 — Página no encontrada';
}