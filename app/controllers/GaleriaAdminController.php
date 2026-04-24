<?php
require_once __DIR__ . '/../models/GaleriaModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class GaleriaAdminController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model          = new GaleriaModel();
        $this->categoriaModel = new CategoriaModel();
    }

    // Listar todas las fotos agrupadas por categoría
    public function index() {
        $categorias = $this->categoriaModel->obtenerActivas();
        $fotos      = $this->model->obtenerTodasConCategoria();

        // Agrupar fotos por categoría
        $fotosPorCategoria = [];
        foreach ($fotos as $foto) {
            $fotosPorCategoria[$foto['categoria_id']][] = $foto;
        }

        require_once __DIR__ . '/../views/admin/galeria/index.php';
    }

    // Formulario para subir fotos
    public function subir() {
        $categorias = $this->categoriaModel->obtenerActivas();
        require_once __DIR__ . '/../views/admin/galeria/subir.php';
    }

    // Procesar subida de fotos
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /LeCapture_Fotografia/admin/galeria');
            exit;
        }

        $categoriaId = intval($_POST['categoria_id'] ?? 0);

        if (!$categoriaId) {
            $error      = 'Seleccioná una categoría.';
            $categorias = $this->categoriaModel->obtenerActivas();
            require_once __DIR__ . '/../views/admin/galeria/subir.php';
            return;
        }

        // Verificar que se subieron archivos
        if (empty($_FILES['fotos']['name'][0])) {
            $error      = 'Seleccioná al menos una foto.';
            $categorias = $this->categoriaModel->obtenerActivas();
            require_once __DIR__ . '/../views/admin/galeria/subir.php';
            return;
        }

        $permitidas  = ['jpg', 'jpeg', 'png', 'webp'];
        $subidas     = 0;
        $errores     = 0;
        $totalArchivos = count($_FILES['fotos']['name']);

        for ($i = 0; $i < $totalArchivos; $i++) {
            if ($_FILES['fotos']['error'][$i] !== UPLOAD_ERR_OK) {
                $errores++;
                continue;
            }

            $extension = strtolower(pathinfo($_FILES['fotos']['name'][$i], PATHINFO_EXTENSION));

            if (!in_array($extension, $permitidas)) {
                $errores++;
                continue;
            }

            if ($_FILES['fotos']['size'][$i] > 5 * 1024 * 1024) {
                $errores++;
                continue;
            }

            $nombre  = 'galeria_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
            $carpeta = __DIR__ . '/../../uploads';
            $destino = $carpeta . DIRECTORY_SEPARATOR . $nombre;

            if (!is_dir($carpeta)) {
                mkdir($carpeta, 0755, true);
            }

            if (move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $destino)) {
                $this->model->insertar([
                    'categoria_id'   => $categoriaId,
                    'nombre_archivo' => $_FILES['fotos']['name'][$i],
                    'ruta'           => $nombre,
                    'descripcion'    => trim($_POST['descripcion'] ?? ''),
                    'destacada'      => isset($_POST['destacada']) ? 1 : 0,
                    'orden'          => 0,
                ]);
                $subidas++;
            } else {
                $errores++;
            }
        }

        if ($subidas > 0) {
            header('Location: /LeCapture_Fotografia/admin/galeria?subidas=' . $subidas);
        } else {
            $error      = 'No se pudo subir ninguna foto. Verificá el formato y tamaño.';
            $categorias = $this->categoriaModel->obtenerActivas();
            require_once __DIR__ . '/../views/admin/galeria/subir.php';
        }
        exit;
    }

    // Eliminar foto
    public function eliminar($id) {
        if (!$id) {
            header('Location: /LeCapture_Fotografia/admin/galeria');
            exit;
        }

        $foto = $this->model->obtenerPorId($id);

        if ($foto) {
            $ruta = __DIR__ . '/../../uploads/' . $foto['ruta'];
            if (file_exists($ruta)) unlink($ruta);
            $this->model->eliminar($id);
        }

        header('Location: /LeCapture_Fotografia/admin/galeria');
        exit;
    }
}