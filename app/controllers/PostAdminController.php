<?php
require_once __DIR__ . '/../models/PostModel.php';

class PostAdminController {
    private $model;

    public function __construct() {
        $this->model = new PostModel();
    }

    public function index() {
        $posts = $this->model->obtenerTodos();
        require_once __DIR__ . '/../views/admin/posts/index.php';
    }

    public function nuevo() {
        require_once __DIR__ . '/../views/admin/posts/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /LeCapture_Fotografia/admin/posts');
            exit;
        }

        $titulo = trim($_POST['titulo'] ?? '');
        $contenido = trim($_POST['contenido'] ?? '');
        $publicado = isset($_POST['publicado']) ? 1 : 0;
        $destacado = isset($_POST['destacado']) ? 1 : 0;
        $slug = strtolower(str_replace(' ', '-', $titulo));

        if (empty($titulo) || empty($contenido)) {
            $error = 'Completá todos los campos obligatorios.';
            require_once __DIR__ . '/../views/admin/posts/form.php';
            return;
        }

        if ($this->model->slugExiste($slug)) {
            $error = 'El slug ya existe. Elegí otro.';
            require_once __DIR__ . '/../views/admin/posts/form.php';
            return;
        }

        $imagen = $this->subirImagen();

        $datos = [
            'titulo' => $titulo,
            'slug' => $slug,
            'contenido' => $contenido,
            'imagen_portada' => $imagen,
            'publicado' => $publicado,
            'destacado' => $destacado,
            'fecha_publicacion' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->model->insertar($datos);
        header('Location: /LeCapture_Fotografia/admin/posts');
        exit;
    }



            // Formulario editar
        public function editar($id) {
            if (!$id) {
                header('Location: /LeCapture_Fotografia/admin/posts');
                exit;
            }
            $post = $this->model->obtenerPorId($id);
            if (!$post) {
                header('Location: /LeCapture_Fotografia/admin/posts');
                exit;
            }
            require_once __DIR__ . '/../views/admin/posts/form.php';
        }

        // Actualizar post existente
        public function actualizar($id) {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$id) {
                header('Location: /LeCapture_Fotografia/admin/posts');
                exit;
            }

            $titulo    = trim($_POST['titulo'] ?? '');
            $contenido = trim($_POST['contenido'] ?? '');

            if (empty($titulo) || empty($contenido)) {
                $error = 'El título y el contenido son obligatorios.';
                $post  = $this->model->obtenerPorId($id);
                require_once __DIR__ . '/../views/admin/posts/form.php';
                return;
            }

            $postActual = $this->model->obtenerPorId($id);

            // Regenerar slug solo si cambió el título
            $slug = $this->generarSlug($titulo);
            if ($this->model->slugExiste($slug, $id)) {
                $slug = $slug . '-' . time();
            }

            // Si subieron imagen nueva la reemplaza, sino mantiene la anterior
            $imagen = $this->subirImagen();
            if (!$imagen) $imagen = $postActual['imagen_portada'];

            // Fecha de publicación: solo se setea la primera vez que se publica
            $yaPublicado  = $postActual['publicado'];
            $ahoraPublica = isset($_POST['publicado']) ? 1 : 0;
            $fechaPublicacion = $postActual['fecha_publicacion'];
            if (!$yaPublicado && $ahoraPublica) {
                $fechaPublicacion = date('Y-m-d H:i:s');
            }

            $datos = [
                'titulo'            => $titulo,
                'slug'              => $slug,
                'contenido'         => $contenido,
                'imagen_portada'    => $imagen,
                'destacado'         => isset($_POST['destacado']) ? 1 : 0,
                'publicado'         => $ahoraPublica,
                'fecha_publicacion' => $fechaPublicacion,
            ];

            $this->model->actualizar($id, $datos);
            header('Location: /LeCapture_Fotografia/admin/posts');
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
            if (empty($_FILES['imagen']['name'])) return null;

            $archivo    = $_FILES['imagen'];
            $extension  = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
            $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $permitidas)) return null;
            if ($archivo['size'] > 5 * 1024 * 1024) return null;
            if ($archivo['error'] !== UPLOAD_ERR_OK) return null;

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
            header('Location: /LeCapture_Fotografia/admin/posts');
            exit;
        }

        $post = $this->model->obtenerPorId($id);

        if ($post && $post['imagen_portada']) {
            $ruta = __DIR__ . '/../../uploads/' . $post['imagen_portada'];
            if (file_exists($ruta)) unlink($ruta);
        }

        $this->model->eliminar($id);
        header('Location: /LeCapture_Fotografia/admin/posts');
        exit;
    }

}