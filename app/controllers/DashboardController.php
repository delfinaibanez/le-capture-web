<?php
require_once __DIR__ . '/../models/PostModel.php';
require_once __DIR__ . '/../models/GaleriaModel.php';
require_once __DIR__ . '/../models/ResenaModels.php';

class DashboardController {
    public function index() {
        $nombre = $_SESSION['admin_nombre'];

        $postModel    = new PostModel();
        $galeriaModel = new GaleriaModel();
        $resenaModel  = new ResenaModel();

        $postCount = (int) $postModel->contarPublicados();
        $fotoCount = (int) $galeriaModel->contarFotos();
        $resenasPendientes = (int) $resenaModel->contarPendientes();

        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}