<?php
require_once __DIR__ . '/Model.php';

class GaleriaModel extends Model {
    protected $tabla = 'galeria_fotos';

    public function obtenerPorCategoria($categoriaId) {
        $stmt = $this->db->prepare("
            SELECT * FROM galeria_fotos 
            WHERE categoria_id = :categoria_id 
            ORDER BY orden ASC, created_at DESC
        ");
        $stmt->execute([':categoria_id' => $categoriaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodasConCategoria() {
        $stmt = $this->db->prepare("
            SELECT g.*, c.nombre AS categoria_nombre 
            FROM galeria_fotos g
            JOIN categorias_sesion c ON g.categoria_id = c.id
            ORDER BY c.orden ASC, g.orden ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarFotos() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM galeria_fotos");
        $stmt->execute();
        return $stmt->fetchColumn();
    }




    public function obtenerDestacadaPorCategoria($categoriaId) {
    $stmt = $this->db->prepare("
        SELECT * FROM galeria_fotos 
        WHERE categoria_id = :categoria_id 
        AND destacada = 1 
        ORDER BY created_at DESC 
        LIMIT 1
    ");
    $stmt->execute([':categoria_id' => $categoriaId]);
    $foto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no hay destacada, trae la primera disponible
    if (!$foto) {
        $stmt = $this->db->prepare("
            SELECT * FROM galeria_fotos 
            WHERE categoria_id = :categoria_id 
            ORDER BY created_at ASC 
            LIMIT 1
        ");
        $stmt->execute([':categoria_id' => $categoriaId]);
        $foto = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $foto;
}
}