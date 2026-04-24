<?php
require_once __DIR__ . '/Model.php';

class PostModel extends Model {
    protected $tabla = 'posts_blog';

    public function obtenerPublicados() {
        $stmt = $this->db->prepare("
            SELECT * FROM posts_blog 
            WHERE publicado = 1 
            ORDER BY fecha_publicacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerDestacados() {
        $stmt = $this->db->prepare("
            SELECT * FROM posts_blog 
            WHERE publicado = 1 AND destacado = 1 
            ORDER BY fecha_publicacion DESC 
            LIMIT 3
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorSlug($slug) {
        $stmt = $this->db->prepare("
            SELECT * FROM posts_blog 
            WHERE slug = :slug AND publicado = 1
        ");
        $stmt->execute([':slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function slugExiste($slug, $excludeId = null) {
        $sql = "SELECT id FROM posts_blog WHERE slug = :slug";
        if ($excludeId) $sql .= " AND id != :id";
        $stmt = $this->db->prepare($sql);
        $params = [':slug' => $slug];
        if ($excludeId) $params[':id'] = $excludeId;
        $stmt->execute($params);
        return $stmt->fetch() !== false;
    }

    public function contarPublicados() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM posts_blog WHERE publicado = 1");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}