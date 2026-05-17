<?php
require_once __DIR__ . '/Model.php';

class TematicaModel extends Model {
    protected $tabla = 'tematicas';

    public function obtenerActivas() {
        $stmt = $this->db->prepare("
            SELECT * FROM tematicas 
            WHERE activa = 1 
            ORDER BY orden ASC, created_at ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}