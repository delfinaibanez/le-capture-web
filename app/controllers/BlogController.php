<?php
require_once __DIR__ . '/../models/PostModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class BlogController {
    public function index() {
        $postModel      = new PostModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->obtenerCapitulos();
        $tematicas  = $categoriaModel->obtenerTematicas();
        $posts      = $postModel->obtenerPublicados();

        $paginaActiva = 'blog';
        require_once __DIR__ . '/../views/blog/index.php';
    }
    public function categoria($slug) {
        $postModel      = new PostModel();
        $categoriaModel = new CategoriaModel();

        $categoria = $categoriaModel->obtenerPorSlug($slug);
        if (!$categoria) {
            http_response_code(404);
            echo '404 — Categoría no encontrada';
            exit;
        }

        $categorias = $categoriaModel->obtenerCapitulos();
        $tematicas  = $categoriaModel->obtenerTematicas();
        $posts      = $postModel->obtenerPublicadosPorCategoria($categoria['id']);

        $paginaActiva = 'blog';
        $categoriaSeleccionada = $categoria;
        require_once __DIR__ . '/../views/blog/index.php';
    }

    public function post($slug) {
        $postModel      = new PostModel();
        $categoriaModel = new CategoriaModel();

        $post = $postModel->obtenerPorSlug($slug);
        if (!$post) {
            http_response_code(404);
            echo '404 — Post no encontrado';
            exit;
        }

        $categoria = null;
        if (!empty($post['categoria_id'])) {
            $categoria = $categoriaModel->obtenerPorId($post['categoria_id']);
        }

        $relacionados = [];
        if (!empty($post['categoria_id'])) {
            $relacionados = $postModel->obtenerRelacionados($post['categoria_id'], $post['id']);
        }

        $paginaActiva = 'blog';
        require_once __DIR__ . '/../views/blog/post.php';
    }
}