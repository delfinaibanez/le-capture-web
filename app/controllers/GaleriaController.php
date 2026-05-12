<?php
require_once __DIR__ . '/../models/GaleriaModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class GaleriaController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model          = new GaleriaModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function index() {
        header('Location: /leCapture_web/le-capture-web/');
        exit;
    }

    public function categoria($slug) {
        $categoria = $this->categoriaModel->obtenerPorSlug($slug);

        if (!$categoria) {
            http_response_code(404);
            echo '404 — Categoría no encontrada';
            exit;
        }

        // Caso especial para bebés
        if ($slug === 'bebes') {
            $cat36   = $this->categoriaModel->obtenerPorSlug('bebes-3-6');
            $cat69   = $this->categoriaModel->obtenerPorSlug('bebes-6-9');
            $fotos36 = $cat36 ? $this->model->obtenerPorCategoria($cat36['id']) : [];
            $fotos69 = $cat69 ? $this->model->obtenerPorCategoria($cat69['id']) : [];
            require_once __DIR__ . '/../views/sesiones/bebes.php';
            return;
        }

        $fotos = $this->model->obtenerPorCategoria($categoria['id']);
        require_once __DIR__ . '/../views/sesiones/' . $slug . '.php';
    }
}