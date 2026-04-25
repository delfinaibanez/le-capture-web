<?php
require_once __DIR__ . '/../models/PostModel.php';
require_once __DIR__ . '/../models/ResenaModels.php';
require_once __DIR__ . '/../models/CategoriaModel.php';
require_once __DIR__ . '/../models/GaleriaModel.php';

class InicioController {
   public function index() {
    $postModel      = new PostModel();
    $resenaModel    = new ResenaModel();
    $categoriaModel = new CategoriaModel();
    $galeriaModel   = new GaleriaModel();

    $postsDestacados  = $postModel->obtenerDestacados();
    $resenasAprobadas = $resenaModel->obtenerAprobadas();
    $categorias       = $categoriaModel->obtenerActivas();
    $todasLasFotos    = $galeriaModel->obtenerTodasConCategoria();

    // Foto destacada por categoría
    $fotosPorCategoria = [];
    foreach ($categorias as $cat) {
        $foto = $galeriaModel->obtenerDestacadaPorCategoria($cat['id']);
        if ($foto) {
            $fotosPorCategoria[$cat['id']][] = $foto;
        }
    }

    // 6 fotos para la grilla momentos
    $fotosMomentos = array_slice($todasLasFotos, 0, 6);

    require_once __DIR__ . '/../views/home/index.php';
}
}