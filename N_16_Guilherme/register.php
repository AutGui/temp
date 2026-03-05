<?php
require_once __DIR__ . '/core/functions.php';

if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}

$title = 'Registar · TechnoGenesis';
$token = csrf_token();
$old_username = $_SESSION['old_username'] ?? '';
unset($_SESSION['old_username']);
include __DIR__ . '/share/header.php';
?>

<h2 class="mb-3">Registar</h2>

<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-warning" role="alert">
    <?= h($_SESSION['error']); unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>

<div class="row justify-content-center">
  <div class="col-12 col-md-6">
    <form method="POST" action="process_register.php" class="card p-4 shadow-sm">
      <input type="hidden" name="csrf_token" value="<?= h($token) ?>">

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input
          type="text"
          name="username"
          class="form-control"
          required
          autocomplete="username"
          value="<?= h($old_username) ?>"
        >
        <div class="form-text">3-20 caracteres (letras, números e underscore).</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required autocomplete="new-password">
        <div class="form-text">Mínimo 6 caracteres.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirmar password</label>
        <input type="password" name="confirm_password" class="form-control" required autocomplete="new-password">
      </div>

      <button class="btn btn-primary w-100">Criar conta</button>

      <div class="mt-3 text-center">
        <a href="<?= h(url('login.php')) ?>">Já tens conta? Login</a>
      </div>
    </form>
  </div>
</div>

<?php include __DIR__ . '/share/footer.php'; ?>
