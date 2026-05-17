<?php
require_once __DIR__ . '/../models/TematicaModel.php';

class TematicaAdminController {
    private $model;

    public function __construct() {
        $this->model = new TematicaModel();
    }

    public function index() {
        $tematicas = $this->model->obtenerTodos();
        require_once __DIR__ . '/../views/admin/tematicas/index.php';
    }

    public function nueva() {
        require_once __DIR__ . '/../views/admin/tematicas/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /leCapture_web/le-capture-web/admin/tematicas');
            exit;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $orden  = intval($_POST['orden'] ?? 0);
        $activa = isset($_POST['activa']) ? 1 : 0;

        if (empty($nombre)) {
            $error = 'El nombre es obligatorio.';
            require_once __DIR__ . '/../views/admin/tematicas/form.php';
            return;
        }

        $imagen = $this->subirImagen();

        $this->model->insertar([
            'nombre' => $nombre,
            'imagen' => $imagen,
            'orden'  => $orden,
            'activa' => $activa,
        ]);

        header('Location: /leCapture_web/le-capture-web/admin/tematicas?guardado=1');
        exit;
    }

    public function editar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/tematicas');
            exit;
        }
        $tematica = $this->model->obtenerPorId($id);
        if (!$tematica) {
            header('Location: /leCapture_web/le-capture-web/admin/tematicas');
            exit;
        }
        require_once __DIR__ . '/../views/admin/tematicas/form.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$id) {
            header('Location: /leCapture_web/le-capture-web/admin/tematicas');
            exit;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $orden  = intval($_POST['orden'] ?? 0);
        $activa = isset($_POST['activa']) ? 1 : 0;

        if (empty($nombre)) {
            $error    = 'El nombre es obligatorio.';
            $tematica = $this->model->obtenerPorId($id);
            require_once __DIR__ . '/../views/admin/tematicas/form.php';
            return;
        }

        $tematicaActual = $this->model->obtenerPorId($id);
        $imagen = $this->subirImagen();
        if (!$imagen) $imagen = $tematicaActual['imagen'];

        $this->model->actualizar($id, [
            'nombre' => $nombre,
            'imagen' => $imagen,
            'orden'  => $orden,
            'activa' => $activa,
        ]);

        header('Location: /leCapture_web/le-capture-web/admin/tematicas?guardado=1');
        exit;
    }

    public function eliminar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/tematicas');
            exit;
        }

        $tematica = $this->model->obtenerPorId($id);
        if ($tematica && $tematica['imagen']) {
            $ruta = __DIR__ . '/../../uploads/' . $tematica['imagen'];
            if (file_exists($ruta)) unlink($ruta);
        }

        $this->model->eliminar($id);
        header('Location: /leCapture_web/le-capture-web/admin/tematicas');
        exit;
    }

    private function subirImagen() {
        if (empty($_FILES['imagen']['name'])) return null;

        $archivo    = $_FILES['imagen'];
        $extension  = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($extension, $permitidas)) return null;
        if ($archivo['size'] > 5 * 1024 * 1024) return null;
        if ($archivo['error'] !== UPLOAD_ERR_OK) return null;

        $nombre  = 'tematica_' . time() . '_' . rand(100, 999) . '.' . $extension;
        $carpeta = __DIR__ . '/../../uploads';
        $destino = $carpeta . DIRECTORY_SEPARATOR . $nombre;

        if (move_uploaded_file($archivo['tmp_name'], $destino)) {
            return $nombre;
        }
        return null;
    }
}