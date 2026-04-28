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
        $config     = $this->leerConfiguracion();

        // Agrupar fotos por categoría
        $fotosPorCategoria = [];
        foreach ($fotos as $foto) {
            $fotosPorCategoria[$foto['categoria_id']][] = $foto;
        }

        require_once __DIR__ . '/../views/admin/galeria/index.php';
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /LeCapture_Fotografia/admin/galeria');
            exit;
        }

        $visibleFotos = array_map('intval', $_POST['fotos_visible'] ?? []);
        $maxFotos     = intval($_POST['max_mostrar'] ?? 6);
        $maxFotos     = max(1, min($maxFotos, 10));

        $config = [
            'visible' => $visibleFotos,
            'maxFotos' => $maxFotos,
        ];

        $this->guardarConfiguracion($config);
        header('Location: /LeCapture_Fotografia/admin/galeria?guardado=1');
        exit;
    }

    private function leerConfiguracion() {
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

    private function guardarConfiguracion(array $config) {
        $ruta = __DIR__ . '/../../config/galeria_settings.json';
        file_put_contents($ruta, json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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