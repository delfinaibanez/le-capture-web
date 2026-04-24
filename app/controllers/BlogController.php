<?php
class BlogController {
    public function index() {
        echo 'Blog — próximamente';
    }
    public function post($slug) {
        echo 'Post: ' . htmlspecialchars($slug);
    }
}