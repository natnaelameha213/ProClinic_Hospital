<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Africa/Addis_Ababa');

$host = 'localhost';
$db   = 'proclinic';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed. Import database/proclinic.sql first.");
}

if (!defined('BASE_URL')) {
    $docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
    $appRoot = str_replace('\\', '/', realpath(__DIR__ . '/..') ?: (__DIR__ . '/..'));
    $base = '';
    if ($docRoot !== '' && strpos($appRoot, $docRoot) === 0) {
        $base = substr($appRoot, strlen($docRoot));
    }
    if ($base === '' || $base === false) {
        $base = '/' . basename($appRoot);
    }
    define('BASE_URL', rtrim($base, '/') ?: '');
}

function base_url($path = '') {
    $path = ltrim((string)$path, '/');
    return BASE_URL . ($path !== '' ? '/' . $path : '');
}

// CSRF protection for every POST form
require_once __DIR__ . '/csrf.php';
