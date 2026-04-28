<?php
require_once __DIR__ . '/Model.php';

class CategoriaModel extends Model {
    protected $tabla = 'categorias_sesion';

    public function obtenerActivas() {
        $stmt = $this->db->prepare("
            SELECT * FROM categorias_sesion 
            WHERE activa = 1 
            ORDER BY orden ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function obtenerUltimaTematica() {
    $stmt = $this->db->prepare("
        SELECT * FROM categorias_sesion 
        WHERE activa = 1 
        ORDER BY orden DESC 
        LIMIT 1
    ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}