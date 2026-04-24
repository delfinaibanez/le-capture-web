<?php
require_once __DIR__ . '/../models/ResenaModels.php';

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
            header('Location: /LeCapture_Fotografia/admin/resenas');
            exit;
        }
        $this->model->aprobar($id);
        header('Location: /LeCapture_Fotografia/admin/resenas');
        exit;
    }

    public function eliminar($id) {
        if (!$id) {
            header('Location: /LeCapture_Fotografia/admin/resenas');
            exit;
        }
        $this->model->eliminar($id);
        header('Location: /LeCapture_Fotografia/admin/resenas');
        exit;
    }
}