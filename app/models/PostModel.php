<?php
require_once __DIR__ . '/Model.php';

class PostModel extends Model {
    protected $tabla = 'posts_blog';

    public function obtenerPublicados() {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria_nombre, c.slug AS categoria_slug
            FROM posts_blog p
            LEFT JOIN categorias_sesion c ON p.categoria_id = c.id
            WHERE p.publicado = 1 
            ORDER BY p.fecha_publicacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPublicadosPorCategoria($categoriaId) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria_nombre, c.slug AS categoria_slug
            FROM posts_blog p
            LEFT JOIN categorias_sesion c ON p.categoria_id = c.id
            WHERE p.publicado = 1 AND p.categoria_id = :categoria_id
            ORDER BY p.fecha_publicacion DESC
        ");
        $stmt->execute([':categoria_id' => $categoriaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRelacionados($categoriaId, $excludeId, $limite = 3) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria_nombre, c.slug AS categoria_slug
            FROM posts_blog p
            LEFT JOIN categorias_sesion c ON p.categoria_id = c.id
            WHERE p.publicado = 1 AND p.categoria_id = :categoria_id AND p.id != :exclude_id
            ORDER BY p.fecha_publicacion DESC
            LIMIT :limite
        ");
        $stmt->bindValue(':categoria_id', $categoriaId, PDO::PARAM_INT);
        $stmt->bindValue(':exclude_id', $excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
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
            SELECT p.*, c.nombre AS categoria_nombre, c.slug AS categoria_slug
            FROM posts_blog p
            LEFT JOIN categorias_sesion c ON p.categoria_id = c.id
            WHERE p.slug = :slug AND p.publicado = 1
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

    public function obtenerTodosConCategoria() {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria_nombre
            FROM posts_blog p
            LEFT JOIN categorias_sesion c ON p.categoria_id = c.id
            ORDER BY p.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarPublicados() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM posts_blog WHERE publicado = 1");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}