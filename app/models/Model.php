<?php
require_once __DIR__ . '/../../config/Conexion.php';

class Model {
    protected $db;
    protected $tabla;

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
        $columnas = implode(', ', array_keys($datos));
        $valores  = implode(', ', array_map(fn($k) => ":$k", array_keys($datos)));
        $stmt = $this->db->prepare("INSERT INTO {$this->tabla} ($columnas) VALUES ($valores)");
        $stmt->execute($datos);
        return $this->db->lastInsertId();
    }

    public function actualizar($id, $datos) {
        $set = implode(', ', array_map(fn($k) => "$k = :$k", array_keys($datos)));
        $datos['id'] = $id;
        $stmt = $this->db->prepare("UPDATE {$this->tabla} SET $set WHERE id = :id");
        $stmt->execute($datos);
        return $stmt->rowCount();
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->tabla} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}