<?php
require_once __DIR__ . '/../../config/Conexion.php';
require_once __DIR__ . '/../models/Model.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class NavbarHelper {
    public static function obtenerCategorias() {
        $model = new CategoriaModel();
        return [
            'capitulos' => $model->obtenerCapitulos(),
            'tematicas' => $model->obtenerTematicas(),
        ];
    }
}