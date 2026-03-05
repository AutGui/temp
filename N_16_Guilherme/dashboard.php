<?php
require_once __DIR__ . '/core/functions.php';
require_login();
$title = 'Dashboard · TechnoGenesis';
include __DIR__ . '/share/header.php';
?>
<h1 class="mb-3">Bem-vindo, <?= h($_SESSION['user']) ?>!</h1>
<p class="lead">Área privada do utilizador.</p>
<div class="mt-3">
  <?php if(($_SESSION['role'] ?? '') === 'admin'): ?>
    <a href="admin/synthetics.php" class="btn btn-primary">Gerir Synthetics</a>
  <?php else: ?>
    <div class="alert alert-info">Perfil de utilizador sem permissões de administração.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/share/footer.php'; ?>