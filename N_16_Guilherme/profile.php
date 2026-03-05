<?php
require_once __DIR__ . '/core/functions.php';
require_login();
$title = 'Perfil · TechnoGenesis';
include __DIR__ . '/share/header.php';
?>

<h2 class="mb-3">Perfil</h2>
<div class="card shadow-sm">
  <div class="card-body">
    <dl class="row mb-0">
      <dt class="col-sm-3">Username</dt>
      <dd class="col-sm-9"><?= h($_SESSION['user']) ?></dd>

      <dt class="col-sm-3">Role</dt>
      <dd class="col-sm-9"><?= h($_SESSION['role'] ?? 'user') ?></dd>
    </dl>
  </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
