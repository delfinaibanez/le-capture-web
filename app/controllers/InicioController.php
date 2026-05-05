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
        $categorias       = $categoriaModel->obtenerCapitulos();
        $tematicas        = $categoriaModel->obtenerTematicas();
        $todasLasFotos    = $galeriaModel->obtenerTodasConCategoria();

        // Fotos por categoría
        $fotosPorCategoria = [];
        foreach (array_merge($categorias, $tematicas) as $cat) {
            $foto = $galeriaModel->obtenerDestacadaPorCategoria($cat['id']);
            if ($foto) $fotosPorCategoria[$cat['id']][] = $foto;
        }

        // Temática para el banner
        $ultimaTematica = !empty($tematicas) ? $tematicas[count($tematicas) - 1] : null;
        $fotoTematica   = $ultimaTematica
            ? $galeriaModel->obtenerDestacadaPorCategoria($ultimaTematica['id'])
            : null;

        // Leer configuración de galería para momentos captados
        $configPath = __DIR__ . '/../../config/galeria_settings.json';
        $config = ['visible' => [], 'maxFotos' => 6];
        if (file_exists($configPath)) {
            $data = json_decode(file_get_contents($configPath), true);
            if (is_array($data)) $config = $data;
        }

        if (!empty($config['visible'])) {
            $fotosMomentos = array_filter($todasLasFotos, function($foto) use ($config) {
                return in_array((int)$foto['id'], $config['visible']);
            });
            $fotosMomentos = array_slice(array_values($fotosMomentos), 0, $config['maxFotos']);
        } else {
            $fotosMomentos = array_slice($todasLasFotos, 0, $config['maxFotos']);
        }

        require_once __DIR__ . '/../views/home/index.php';
    }

    public function sobreMi() {
        $paginaActiva = 'sobre-mi';
        require_once __DIR__ . '/../views/sobre-mi/index.php';
    }
}