<?php
require_once __DIR__ . '/../models/AdminModel.php';

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new AdminModel();
    }

    public function loginForm() {
        require_once __DIR__ . '/../views/admin/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /LeCapture_Fotografia/admin/login');
            exit;
        }

        $email    = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            $error = 'Completá todos los campos.';
            require_once __DIR__ . '/../views/admin/login.php';
            return;
        }

        $admin = $this->model->obtenerPorEmail($email);

        if (!$admin || !password_verify($password, $admin['password_hash'])) {
            $error = 'Email o contraseña incorrectos.';
            require_once __DIR__ . '/../views/admin/login.php';
            return;
        }

        $_SESSION['admin_id']     = $admin['id'];
        $_SESSION['admin_nombre'] = $admin['nombre'];

        header('Location: /LeCapture_Fotografia/admin/dashboard');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /LeCapture_Fotografia/admin/login');
        exit;
    }

    public static function verificarSesion() {
        if (empty($_SESSION['admin_id'])) {
            header('Location: /LeCapture_Fotografia/admin/login');
            exit;
        }
    }
}