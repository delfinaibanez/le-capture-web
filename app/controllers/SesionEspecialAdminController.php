<?php
require_once __DIR__ . '/../models/SesionEspecialModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class SesionEspecialAdminController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model          = new SesionEspecialModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function index() {
        $sesiones = $this->model->obtenerTodos();
        require_once __DIR__ . '/../views/admin/sesiones-especiales/index.php';
    }

    public function nueva() {
        require_once __DIR__ . '/../views/admin/sesiones-especiales/form.php';
    }

    public function guardar() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
        exit;
    }

    $nombre      = trim($_POST['nombre'] ?? '');
    $subtitulo   = trim($_POST['subtitulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $fechaApertura = trim($_POST['fecha_apertura'] ?? '') ?: null;
    $fechaCierre   = trim($_POST['fecha_cierre'] ?? '') ?: null;
    $cuposTotales  = intval($_POST['cupos_totales'] ?? 0);
    $cuposOcupados = intval($_POST['cupos_ocupados'] ?? 0);
    $videoUrl      = trim($_POST['video_url'] ?? '');
    $colorPrimario = trim($_POST['color_primario'] ?? '#1a2e1a');
    $ctaTexto      = trim($_POST['cta_texto'] ?? '');
    $publicada     = isset($_POST['publicada']) ? 1 : 0;

    if (empty($nombre)) {
        $error = 'El nombre es obligatorio.';
        require_once __DIR__ . '/../views/admin/sesiones-especiales/form.php';
        return;
    }

    $slug = $this->generarSlug($nombre);
    if ($this->model->slugExiste($slug)) {
        $slug = $slug . '-' . time();
    }

    $maxOrden    = $this->categoriaModel->obtenerMaxOrden();
    $categoriaId = $this->categoriaModel->insertar([
        'nombre'          => $nombre,
        'slug'            => $slug,
        'descripcion'     => $descripcion,
        'orden'           => $maxOrden + 1,
        'activa'          => 1,
        'es_tematica'     => 1,
        'es_subcategoria' => 0,
    ]);

    $this->model->insertar([
        'nombre'          => $nombre,
        'slug'            => $slug,
        'subtitulo'       => $subtitulo,
        'descripcion'     => $descripcion,
        'fecha_apertura'  => $fechaApertura,
        'fecha_cierre'    => $fechaCierre,
        'cupos_totales'   => $cuposTotales,
        'cupos_ocupados'  => $cuposOcupados,
        'video_url'       => $videoUrl,
        'color_primario'  => $colorPrimario,
        'cta_texto'       => $ctaTexto,
        'publicada'       => $publicada,
        'categoria_id'    => $categoriaId,
        'por_que_titulo_1' => trim($_POST['por_que_titulo_1'] ?? ''),
        'por_que_desc_1'   => trim($_POST['por_que_desc_1'] ?? ''),
        'por_que_titulo_2' => trim($_POST['por_que_titulo_2'] ?? ''),
        'por_que_desc_2'   => trim($_POST['por_que_desc_2'] ?? ''),
        'por_que_titulo_3' => trim($_POST['por_que_titulo_3'] ?? ''),
        'por_que_desc_3'   => trim($_POST['por_que_desc_3'] ?? ''),
        'por_que_titulo_4' => trim($_POST['por_que_titulo_4'] ?? ''),
        'por_que_desc_4'   => trim($_POST['por_que_desc_4'] ?? ''),
        'pack1_nombre'     => trim($_POST['pack1_nombre'] ?? ''),
        'pack1_precio'     => trim($_POST['pack1_precio'] ?? ''),
        'pack1_descripcion'=> trim($_POST['pack1_descripcion'] ?? ''),
        'pack1_items'      => trim($_POST['pack1_items'] ?? ''),
        'pack2_nombre'     => trim($_POST['pack2_nombre'] ?? ''),
        'pack2_precio'     => trim($_POST['pack2_precio'] ?? ''),
        'pack2_descripcion'=> trim($_POST['pack2_descripcion'] ?? ''),
        'pack2_items'      => trim($_POST['pack2_items'] ?? ''),
        'pack2_destacado'  => isset($_POST['pack2_destacado']) ? 1 : 0,
        'pack3_nombre'     => trim($_POST['pack3_nombre'] ?? ''),
        'pack3_precio'     => trim($_POST['pack3_precio'] ?? ''),
        'pack3_descripcion'=> trim($_POST['pack3_descripcion'] ?? ''),
        'pack3_items'      => trim($_POST['pack3_items'] ?? ''),
        'faq1_pregunta'    => trim($_POST['faq1_pregunta'] ?? ''),
        'faq1_respuesta'   => trim($_POST['faq1_respuesta'] ?? ''),
        'faq2_pregunta'    => trim($_POST['faq2_pregunta'] ?? ''),
        'faq2_respuesta'   => trim($_POST['faq2_respuesta'] ?? ''),
        'faq3_pregunta'    => trim($_POST['faq3_pregunta'] ?? ''),
        'faq3_respuesta'   => trim($_POST['faq3_respuesta'] ?? ''),
    ]);

    header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales?guardado=1');
    exit;
}

    public function editar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
            exit;
        }
        $sesion = $this->model->obtenerPorId($id);
        if (!$sesion) {
            header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
            exit;
        }
        require_once __DIR__ . '/../views/admin/sesiones-especiales/form.php';
    }

   public function actualizar($id) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$id) {
        header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
        exit;
    }

    $nombre        = trim($_POST['nombre'] ?? '');
    $subtitulo     = trim($_POST['subtitulo'] ?? '');
    $descripcion   = trim($_POST['descripcion'] ?? '');
    $fechaApertura = trim($_POST['fecha_apertura'] ?? '') ?: null;
    $fechaCierre   = trim($_POST['fecha_cierre'] ?? '') ?: null;
    $cuposTotales  = intval($_POST['cupos_totales'] ?? 0);
    $cuposOcupados = intval($_POST['cupos_ocupados'] ?? 0);
    $videoUrl      = trim($_POST['video_url'] ?? '');
    $colorPrimario = trim($_POST['color_primario'] ?? '#1a2e1a');
    $ctaTexto      = trim($_POST['cta_texto'] ?? '');
    $publicada     = isset($_POST['publicada']) ? 1 : 0;

    if (empty($nombre)) {
        $error  = 'El nombre es obligatorio.';
        $sesion = $this->model->obtenerPorId($id);
        require_once __DIR__ . '/../views/admin/sesiones-especiales/form.php';
        return;
    }

    $sesionActual = $this->model->obtenerPorId($id);
    $slug = $this->generarSlug($nombre);
    if ($this->model->slugExiste($slug, $id)) {
        $slug = $slug . '-' . time();
    }

    if ($sesionActual['categoria_id']) {
        $this->categoriaModel->actualizar($sesionActual['categoria_id'], [
            'nombre'      => $nombre,
            'slug'        => $slug,
            'descripcion' => $descripcion,
            'activa'      => $publicada,
        ]);
    }

    $this->model->actualizar($id, [
        'nombre'          => $nombre,
        'slug'            => $slug,
        'subtitulo'       => $subtitulo,
        'descripcion'     => $descripcion,
        'fecha_apertura'  => $fechaApertura,
        'fecha_cierre'    => $fechaCierre,
        'cupos_totales'   => $cuposTotales,
        'cupos_ocupados'  => $cuposOcupados,
        'video_url'       => $videoUrl,
        'color_primario'  => $colorPrimario,
        'cta_texto'       => $ctaTexto,
        'publicada'       => $publicada,
        'por_que_titulo_1' => trim($_POST['por_que_titulo_1'] ?? ''),
        'por_que_desc_1'   => trim($_POST['por_que_desc_1'] ?? ''),
        'por_que_titulo_2' => trim($_POST['por_que_titulo_2'] ?? ''),
        'por_que_desc_2'   => trim($_POST['por_que_desc_2'] ?? ''),
        'por_que_titulo_3' => trim($_POST['por_que_titulo_3'] ?? ''),
        'por_que_desc_3'   => trim($_POST['por_que_desc_3'] ?? ''),
        'por_que_titulo_4' => trim($_POST['por_que_titulo_4'] ?? ''),
        'por_que_desc_4'   => trim($_POST['por_que_desc_4'] ?? ''),
        'pack1_nombre'     => trim($_POST['pack1_nombre'] ?? ''),
        'pack1_precio'     => trim($_POST['pack1_precio'] ?? ''),
        'pack1_descripcion'=> trim($_POST['pack1_descripcion'] ?? ''),
        'pack1_items'      => trim($_POST['pack1_items'] ?? ''),
        'pack2_nombre'     => trim($_POST['pack2_nombre'] ?? ''),
        'pack2_precio'     => trim($_POST['pack2_precio'] ?? ''),
        'pack2_descripcion'=> trim($_POST['pack2_descripcion'] ?? ''),
        'pack2_items'      => trim($_POST['pack2_items'] ?? ''),
        'pack2_destacado'  => isset($_POST['pack2_destacado']) ? 1 : 0,
        'pack3_nombre'     => trim($_POST['pack3_nombre'] ?? ''),
        'pack3_precio'     => trim($_POST['pack3_precio'] ?? ''),
        'pack3_descripcion'=> trim($_POST['pack3_descripcion'] ?? ''),
        'pack3_items'      => trim($_POST['pack3_items'] ?? ''),
        'faq1_pregunta'    => trim($_POST['faq1_pregunta'] ?? ''),
        'faq1_respuesta'   => trim($_POST['faq1_respuesta'] ?? ''),
        'faq2_pregunta'    => trim($_POST['faq2_pregunta'] ?? ''),
        'faq2_respuesta'   => trim($_POST['faq2_respuesta'] ?? ''),
        'faq3_pregunta'    => trim($_POST['faq3_pregunta'] ?? ''),
        'faq3_respuesta'   => trim($_POST['faq3_respuesta'] ?? ''),
    ]);

    header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales?guardado=1');
    exit;
}

    public function eliminar($id) {
        if (!$id) {
            header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
            exit;
        }

        $sesion = $this->model->obtenerPorId($id);

        // Eliminar categoría de galería asociada
        if ($sesion && $sesion['categoria_id']) {
            $this->categoriaModel->eliminar($sesion['categoria_id']);
        }

        $this->model->eliminar($id);
        header('Location: /leCapture_web/le-capture-web/admin/sesiones-especiales');
        exit;
    }

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
}