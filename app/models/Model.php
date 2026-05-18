<?php
require_once __DIR__ . '/../../config/Conexion.php';

class Model {
    protected $db;
    protected $tabla;
    private $cachedColumns = null;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->tabla}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->tabla} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertar($datos) {
        $datosFiltrados = $this->filterColumns($datos);
        if (empty($datosFiltrados)) return false;

        $columnas = implode(', ', array_keys($datosFiltrados));
        $valores  = implode(', ', array_map(fn($k) => ":$k", array_keys($datosFiltrados)));
        $stmt = $this->db->prepare("INSERT INTO {$this->tabla} ($columnas) VALUES ($valores)");
        $stmt->execute($datosFiltrados);
        return $this->db->lastInsertId();
    }

    public function actualizar($id, $datos) {
        $datosFiltrados = $this->filterColumns($datos);
        if (empty($datosFiltrados)) return 0;

        $set = implode(', ', array_map(fn($k) => "$k = :$k", array_keys($datosFiltrados)));
        $datosFiltrados['id'] = $id;
        $stmt = $this->db->prepare("UPDATE {$this->tabla} SET $set WHERE id = :id");
        $stmt->execute($datosFiltrados);
        return $stmt->rowCount();
    }

    private function getTableColumns() {
        if ($this->cachedColumns !== null) return $this->cachedColumns;
        try {
            $stmt = $this->db->query("DESCRIBE {$this->tabla}");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $cols = array_map(fn($r) => $r['Field'], $rows);
            $this->cachedColumns = $cols;
            return $cols;
        } catch (Exception $e) {
            return [];
        }
    }

    private function filterColumns(array $datos) {
        $cols = $this->getTableColumns();
        if (empty($cols)) return [];
        return array_intersect_key($datos, array_flip($cols));
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->tabla} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}