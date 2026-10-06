<?php require_once __DIR__.'/auth.php'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($page_title ?? 'ProClinic') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?= base_url('index.php') ?>">🏥 ProClinic</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php') ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('patients/index.php') ?>">Patients</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('doctors/index.php') ?>">Doctors</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('appointments/index.php') ?>">Appointments</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('records/index.php') ?>">Medical Records</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('prescriptions/index.php') ?>">Prescriptions</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('lab/index.php') ?>">Lab</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('billing/index.php') ?>">Billing</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('reports/index.php') ?>">Reports</a></li>
        <?php if (is_admin()): ?>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('users/index.php') ?>">Users</a></li>
        <?php endif; ?>
      </ul>
      <span class="text-white me-3"><?= e($_SESSION['user']['name'] ?? '') ?></span>
      <a class="btn btn-outline-light btn-sm" href="<?= base_url('auth/logout.php') ?>">Logout</a>
    </div>
  </div>
</nav>
<main class="container-fluid py-4">
