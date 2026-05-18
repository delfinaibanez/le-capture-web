<?php
require_once __DIR__ . '/../models/ResenaModels.php';

class ResenaController {
    private $model;

    public function __construct() {
        $this->model = new ResenaModel();
    }

    public function index() {
        $aprobadas = $this->model->obtenerAprobadas();
        $mensaje   = $_GET['enviado'] ?? null;
        $error     = $_GET['error'] ?? null;
        require_once __DIR__ . '/../views/resenas/index.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /leCapture_web/le-capture-web/resenas');
            exit;
        }

        $nombre     = trim($_POST['nombre'] ?? '');
        $comentario = trim($_POST['comentario'] ?? '');
        $estrellas  = (int) ($_POST['estrellas'] ?? 0);

        if (empty($nombre) || empty($comentario) || $estrellas < 1 || $estrellas > 5) {
            header('Location: /leCapture_web/le-capture-web/resenas?error=1');
            exit;
        }

        $this->model->guardar([
            'nombre_cliente' => $nombre,
            'comentario'     => $comentario,
            'estrellas'      => $estrellas,
        ]);

        header('Location: /leCapture_web/le-capture-web/resenas?enviado=1');
        exit;
    }
}

class ResenaAdminController {
    private $model;

    public function __construct() {
        $this->model = new ResenaModel();
    }

    public function index() {
        $pendientes = $this->model->obtenerPendientes();
        $aprobadas  = $this->model->obtenerAprobadas();
        require_once __DIR__ . '/../views/admin/resenas/index.php';
    }

    public function aprobar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/resenas');
            exit;
        }
        $this->model->aprobar($id);
        header('Location: /leCapture_web/le-capture-web/admin/resenas');
        exit;
    }

    public function eliminar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/resenas');
            exit;
        }
        $this->model->eliminar($id);
        header('Location: /leCapture_web/le-capture-web/admin/resenas');
        exit;
    }
}