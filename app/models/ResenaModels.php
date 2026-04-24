<?php
require_once __DIR__ . '/Model.php';

class ResenaModel extends Model {
    protected $tabla = 'resenas';

    public function obtenerPendientes() {
        $stmt = $this->db->prepare("
            SELECT * FROM resenas 
            WHERE aprobada = 0 
            ORDER BY created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAprobadas() {
        $stmt = $this->db->prepare("
            SELECT * FROM resenas 
            WHERE aprobada = 1 
            ORDER BY created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarPendientes() {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) FROM resenas WHERE aprobada = 0
        ");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function aprobar($id) {
        $stmt = $this->db->prepare("
            UPDATE resenas SET aprobada = 1 WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}