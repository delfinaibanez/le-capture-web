<?php
require_once __DIR__ . '/Model.php';

class SesionEspecialModel extends Model {
    protected $tabla = 'sesiones_especiales';

    public function obtenerPublicadas() {
        $stmt = $this->db->prepare("
            SELECT * FROM sesiones_especiales 
            WHERE publicada = 1 
            ORDER BY created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorSlug($slug) {
        $stmt = $this->db->prepare("
            SELECT * FROM sesiones_especiales 
            WHERE slug = :slug AND publicada = 1
        ");
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function slugExiste($slug, $excludeId = null) {
        $sql = "SELECT id FROM sesiones_especiales WHERE slug = :slug";
        if ($excludeId) $sql .= " AND id != :id";
        $stmt = $this->db->prepare($sql);
        $params = [':slug' => $slug];
        if ($excludeId) $params[':id'] = $excludeId;
        $stmt->execute($params);
        return $stmt->fetch() !== false;
    }
}