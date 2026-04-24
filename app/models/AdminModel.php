<?php
require_once __DIR__ . '/Model.php';

class AdminModel extends Model {
    protected $tabla = 'admin';

    public function obtenerPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}