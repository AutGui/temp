<?php
require_once __DIR__ . '/core/functions.php';
$title = 'TechnoGenesis · Home (PHP)';
include __DIR__ . '/share/header.php';
?>

<div class="p-4 bg-body-tertiary border border-secondary rounded shadow-sm">
  <h1 class="display-5">TechnoGenesis</h1>
  <p class="lead mb-4">TechnoGenesis is a versatile, fast-paced, Cyberpunk genre game. Install synthetics to your liking and go take down the leader.</p>

  <div class="d-flex flex-wrap gap-2">
    <a class="btn btn-outline-light" href="<?= h(url('index_static.php')) ?>">Ver versão estática (PHP)</a>
    <a class="btn btn-outline-light" href="<?= h(url('Synthetics.php')) ?>">Ver Synthetics (dinâmico)</a>

    <?php if (isset($_SESSION['user'])): ?>
      <a class="btn btn-warning" href="<?= h(url('dashboard.php')) ?>">Dashboard</a>
      <a class="btn btn-outline-secondary" href="<?= h(url('profile.php')) ?>">Perfil</a>

      <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
        <a class="btn btn-primary" href="<?= h(url('admin/synthetics.php')) ?>">Gerir Synthetics</a>
        <a class="btn btn-outline-primary" href="<?= h(url('admin/users.php')) ?>">Users</a>
      <?php endif; ?>

      <a class="btn btn-outline-danger" href="<?= h(url('logout.php')) ?>">Logout</a>
    <?php else: ?>
      <a class="btn btn-success" href="<?= h(url('login.php')) ?>">Login</a>
      <a class="btn btn-outline-success" href="<?= h(url('register.php')) ?>">Registar</a>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
