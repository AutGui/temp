<?php
if (!isset($title)) $title = '';
require_once __DIR__ . '/../core/functions.php';
?>
<!DOCTYPE html>
<html lang="pt" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($title) ?></title>
    <link rel="icon" href="<?= h(url('Images/CodedGearStudios Logo Glitched Favicon.ico')) ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= h(url('CSS/Main.css')) ?>">
</head>
<body class="app-background d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?= h(url('index.php')) ?>">
      <img src="<?= h(url('Images/CodedGearStudios Logo Glitched.png')) ?>" alt="" style="height:32px"> TechnoGenesis
    </a>
    <div class="d-flex gap-2">
      <a class="btn btn-outline-light btn-sm" href="<?= h(url('Synthetics.php')) ?>">Synthetics</a>
      <a class="btn btn-outline-light btn-sm" href="<?= h(url('Contact_Us.php')) ?>">Contact</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a class="btn btn-outline-light btn-sm" href="<?= h(url('profile.php')) ?>">Profile</a>
        <a class="btn btn-warning btn-sm" href="<?= h(url('dashboard.php')) ?>">Dashboard</a>
        <?php if(($_SESSION['role'] ?? '') === 'admin'): ?>
          <a class="btn btn-outline-primary btn-sm" href="<?= h(url('admin/users.php')) ?>">Users</a>
          <a class="btn btn-primary btn-sm" href="<?= h(url('admin/synthetics.php')) ?>">Manage Synthetics</a>
        <?php endif; ?>
        <a class="btn btn-outline-light btn-sm" href="<?= h(url('logout.php')) ?>">Logout</a>
      <?php else: ?>
        <a class="btn btn-success btn-sm" href="<?= h(url('login.php')) ?>">Login</a>
        <a class="btn btn-outline-success btn-sm" href="<?= h(url('register.php')) ?>">Registar</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container">
