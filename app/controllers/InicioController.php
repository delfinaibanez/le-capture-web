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
    $config          = $this->leerConfiguracionGaleria();

    $ultimaTematica = $categoriaModel->obtenerUltimaTematica();
    $fotoTematica   = $ultimaTematica
        ? $galeriaModel->obtenerDestacadaPorCategoria($ultimaTematica['id'])
        : null;

    // Foto destacada por categoría
    $fotosPorCategoria = [];
    foreach ($categorias as $cat) {
        $foto = $galeriaModel->obtenerDestacadaPorCategoria($cat['id']);
        if ($foto) {
            $fotosPorCategoria[$cat['id']][] = $foto;
        }
    }

    // Fotos para la grilla momentos captados
    if (!empty($config['visible'])) {
        $todasLasFotos = array_filter($todasLasFotos, fn($foto) => in_array($foto['id'], $config['visible'], true));
        $todasLasFotos = array_values($todasLasFotos);
    }
    $fotosMomentos = array_slice($todasLasFotos, 0, $config['maxFotos']);

    require_once __DIR__ . '/../views/home/index.php';
}

    private function leerConfiguracionGaleria() {
        $ruta = __DIR__ . '/../../config/galeria_settings.json';
        if (!file_exists($ruta)) {
            return ['visible' => [], 'maxFotos' => 6];
        }

        $data = json_decode(file_get_contents($ruta), true);
        if (!is_array($data)) {
            return ['visible' => [], 'maxFotos' => 6];
        }

        $data['visible'] = array_map('intval', $data['visible'] ?? []);
        $data['maxFotos'] = max(1, min(intval($data['maxFotos'] ?? 6), 10));
        return $data;
    }
}