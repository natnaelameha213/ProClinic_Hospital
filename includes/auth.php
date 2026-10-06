<?php
require_once __DIR__ . '/../config/config.php';

if (!isset($_SESSION['user'])) {
    header('Location: ' . base_url('auth/login.php'));
    exit;
}

function e($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

function is_admin() {
    return ($_SESSION['user']['role'] ?? '') === 'admin';
}
