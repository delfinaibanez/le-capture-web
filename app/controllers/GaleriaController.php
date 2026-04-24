<?php
class GaleriaController {
    public function index() {
        echo 'Galería — próximamente';
    }
    public function categoria($slug) {
        echo 'Categoría: ' . htmlspecialchars($slug);
    }
}