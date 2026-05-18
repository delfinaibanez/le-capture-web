<?php
require_once __DIR__ . '/../models/TematicaModel.php';

class TematicaController {
    public function index() {
        $model = new TematicaModel();
        $tematicas = $model->obtenerActivas();
        $paginaActiva = 'tematicas';
        require_once __DIR__ . '/../views/tematicas/index.php';
    }
}
