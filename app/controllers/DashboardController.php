<?php
require_once __DIR__ . '/../models/AdminModel.php';

class DashboardController {
    public function index() {
        $nombre = $_SESSION['admin_nombre'];
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}