<?php
require_once __DIR__ . '/core/functions.php';
$title = 'Login · TechnoGenesis';
$token = csrf_token();
include __DIR__ . '/share/header.php';
?>
<h2 class="mb-3">Login</h2>

<?php if (isset($_SESSION['success'])): ?>
  <div class="alert alert-success" role="alert">
    <?= h($_SESSION['success']); unset($_SESSION['success']); ?>
  </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-warning" role="alert">
    <?= h($_SESSION['error']); unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>
<div class="row justify-content-center">
  <div class="col-12 col-md-6">
    <form method="POST" action="process_login.php" class="card p-4 shadow-sm">
      <input type="hidden" name="csrf_token" value="<?= h($token) ?>">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Entrar</button>
      <div class="mt-3 text-center">
        <a href="<?= h(url('register.php')) ?>">Ainda não tens conta? Registar</a>
      </div>
    </form>
  </div>
</div>
<?php include __DIR__ . '/share/footer.php'; ?>