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

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->tabla} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    // --- ESTAS FUNCIONES HACEN LA MAGIA ---

    public function insertar($datos) {
        // Quitamos elementos que no sean columnas de la DB si existieran
        $columnas = implode(', ', array_keys($datos));
        $placeholders = ':' . implode(', :', array_keys($datos));
        
        $sql = "INSERT INTO {$this->tabla} ($columnas) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($datos);
        return $this->db->lastInsertId();
    }

    public function actualizar($id, $datos) {
        $campos = [];
        foreach ($datos as $key => $value) {
            $campos[] = "$key = :$key";
        }
        
        $sql = "UPDATE {$this->tabla} SET " . implode(', ', $campos) . " WHERE id = :id_para_el_where";
        
        $stmt = $this->db->prepare($sql);
        
        // Agregamos el ID al array de datos para el WHERE
        $datos['id_para_el_where'] = $id;
        
        return $stmt->execute($datos);
    }
}