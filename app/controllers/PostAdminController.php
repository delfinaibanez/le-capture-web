<?php
require_once __DIR__ . '/../models/PostModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class PostAdminController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model          = new PostModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function index() {
        $posts = $this->model->obtenerTodosConCategoria();
        require_once __DIR__ . '/../views/admin/posts/index.php';
    }

    public function nuevo() {
        $categorias = $this->categoriaModel->obtenerActivas();
        require_once __DIR__ . '/../views/admin/posts/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /leCapture_web/le-capture-web/admin/posts');
            exit;
        }

        $titulo         = trim($_POST['titulo'] ?? '');
        $subtitulo      = trim($_POST['subtitulo'] ?? '');
        $introduccion   = trim($_POST['introduccion'] ?? '');
        $contenido      = trim($_POST['contenido'] ?? '');
        $consejoPractico= trim($_POST['consejo_practico'] ?? '');
        $categoriaId    = trim($_POST['categoria_id'] ?? '');
        $publicado      = isset($_POST['publicado']) ? 1 : 0;
        $destacado      = isset($_POST['destacado']) ? 1 : 0;
        $slug           = $this->generarSlug($titulo);

        if (empty($titulo) || empty($contenido) || empty($categoriaId)) {
            $error = 'Completá todos los campos obligatorios y seleccioná una categoría.';
            $categorias = $this->categoriaModel->obtenerActivas();
            require_once __DIR__ . '/../views/admin/posts/form.php';
            return;
        }

        if ($this->model->slugExiste($slug)) {
            $slug = $slug . '-' . time();
        }

        $imagen = $this->subirImagen();

        $fechaPublicacion = $publicado ? date('Y-m-d H:i:s') : null;

        $datos = [
            'titulo'           => $titulo,
            'subtitulo'        => $subtitulo,
            'introduccion'     => $introduccion,
            'contenido'        => $contenido,
            'consejo_practico' => $consejoPractico,
            'categoria_id'     => $categoriaId,
            'imagen_portada'   => $imagen,
            'publicado'        => $publicado,
            'destacado'        => $destacado,
            'autor'            => 'Candela',
            'slug'            => $slug,
            'fecha_publicacion'=> $fechaPublicacion,
            'created_at'       => date('Y-m-d H:i:s')
        ];

        $this->model->insertar($datos);
        header('Location: /leCapture_web/le-capture-web/admin/posts');
        exit;
    }



            // Formulario editar
        public function editar($id) {
            if (!$id) {
                header('Location: /leCapture_web/le-capture-web/admin/posts');
                exit;
            }
            $post = $this->model->obtenerPorId($id);
            if (!$post) {
                header('Location: /leCapture_web/le-capture-web/admin/posts');
                exit;
            }
            $categorias = $this->categoriaModel->obtenerActivas();
            require_once __DIR__ . '/../views/admin/posts/form.php';
        }

        // Actualizar post existente
        public function actualizar($id) {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$id) {
                header('Location: /leCapture_web/le-capture-web/admin/posts');
                exit;
            }

            $titulo          = trim($_POST['titulo'] ?? '');
            $subtitulo       = trim($_POST['subtitulo'] ?? '');
            $introduccion    = trim($_POST['introduccion'] ?? '');
            $contenido       = trim($_POST['contenido'] ?? '');
            $consejoPractico = trim($_POST['consejo_practico'] ?? '');
            $categoriaId     = trim($_POST['categoria_id'] ?? '');

            if (empty($titulo) || empty($contenido) || empty($categoriaId)) {
                $error = 'Completá todos los campos obligatorios y seleccioná una categoría.';
                $post  = $this->model->obtenerPorId($id);
                $categorias = $this->categoriaModel->obtenerActivas();
                require_once __DIR__ . '/../views/admin/posts/form.php';
                return;
            }

            $postActual = $this->model->obtenerPorId($id);

            $slug = $this->generarSlug($titulo);
            if ($this->model->slugExiste($slug, $id)) {
                $slug = $slug . '-' . time();
            }

            $imagen = $this->subirImagen();
            if (!$imagen) $imagen = $postActual['imagen_portada'];

            $yaPublicado  = $postActual['publicado'];
            $ahoraPublica = isset($_POST['publicado']) ? 1 : 0;
            $fechaPublicacion = $postActual['fecha_publicacion'];
            if (!$yaPublicado && $ahoraPublica) {
                $fechaPublicacion = date('Y-m-d H:i:s');
            }

            $datos = [
                'titulo'            => $titulo,
                'subtitulo'         => $subtitulo,
                'introduccion'      => $introduccion,
                'contenido'         => $contenido,
                'consejo_practico'  => $consejoPractico,
                'categoria_id'      => $categoriaId,
                'slug'              => $slug,
                'imagen_portada'    => $imagen,
                'destacado'         => isset($_POST['destacado']) ? 1 : 0,
                'publicado'         => $ahoraPublica,
                'autor'             => 'Candela',
                'fecha_publicacion' => $fechaPublicacion,
            ];

            $this->model->actualizar($id, $datos);
            header('Location: /leCapture_web/le-capture-web/admin/posts');
            exit;
        }

       
        // ─────────────────────────────────────────
        // HELPERS PRIVADOS
        // ─────────────────────────────────────────
        private function generarSlug($texto) {
            $texto = strtolower($texto);
            $texto = str_replace(
                ['á','é','í','ó','ú','ñ','ü'],
                ['a','e','i','o','u','n','u'],
                $texto
            );
            $texto = preg_replace('/[^a-z0-9\s-]/', '', $texto);
            $texto = preg_replace('/[\s-]+/', '-', trim($texto));
            return $texto;
        }

        private function subirImagen() {
            if (empty($_FILES['imagen']['name'])) {
                return null;
            }

            $archivo    = $_FILES['imagen'];
            $extension  = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
            $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $permitidas)) {
                return null;
            }
            if ($archivo['size'] > 5 * 1024 * 1024) {
                return null;
            }
            if ($archivo['error'] !== UPLOAD_ERR_OK) {
                return null;
            }

            $nombre  = 'post_' . time() . '_' . rand(100, 999) . '.' . $extension;
            $carpeta = __DIR__ . '/../../uploads';

            if (!is_dir($carpeta)) {
                mkdir($carpeta, 0755, true);
            }

            $destino = $carpeta . DIRECTORY_SEPARATOR . $nombre;

            if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                return $nombre;
            }

            return null;
        }

        public function eliminar($id) {
            if (!$id) {
                header('Location: /leCapture_web/le-capture-web/admin/posts');
                exit;
            }

        $post = $this->model->obtenerPorId($id);

        if ($post && $post['imagen_portada']) {
            $ruta = __DIR__ . '/../../uploads/' . $post['imagen_portada'];
            if (file_exists($ruta)) unlink($ruta);
        }

        $this->model->eliminar($id);
        header('Location: /leCapture_web/le-capture-web/admin/posts');
        exit;
    }

}