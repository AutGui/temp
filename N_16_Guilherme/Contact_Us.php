<?php
require_once __DIR__ . '/core/functions.php';

$title = 'TechnoGenesis · Contact Us';

$values = [
    'name' => '',
    'email' => '',
    'message' => '',
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check('Contact_Us.php');

    $name_raw = trim((string)($_POST['name'] ?? ''));
    $email_raw = trim((string)($_POST['email'] ?? ''));
    $message_raw = trim((string)($_POST['message'] ?? ''));

    $values['name'] = sanitize_string($name_raw);
    $values['email'] = sanitize_string($email_raw);
    $values['message'] = sanitize_string($message_raw);

    if ($name_raw === '') {
        $errors['name'] = 'Nome obrigatório.';
    } elseif (strlen($name_raw) > 80) {
        $errors['name'] = 'Nome demasiado longo (máx. 80 caracteres).';
    }

    if ($email_raw === '') {
        $errors['email'] = 'Email obrigatório.';
    } elseif (!filter_var($email_raw, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email inválido.';
    }

    if ($message_raw === '') {
        $errors['message'] = 'Mensagem obrigatória.';
    } elseif (strlen($message_raw) > 2000) {
        $errors['message'] = 'Mensagem demasiado longa (máx. 2000 caracteres).';
    }

    if (!$errors) {
        $_SESSION['flash_success'] = 'Obrigado pelo teu feedback!';
        redirect('Contact_Us.php');
    }
}

$flash_success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);

$token = csrf_token();
include __DIR__ . '/share/header.php';
?>

<h1 class="mb-3">Contact Us</h1>
<p class="text-muted">Have feedback about the game? Send us a message below.</p>

<?php if ($flash_success): ?>
  <div class="alert alert-success" role="alert"><?= h($flash_success) ?></div>
<?php endif; ?>

<form method="POST" class="card p-4 shadow-sm" novalidate>
  <input type="hidden" name="csrf_token" value="<?= h($token) ?>">

  <div class="mb-3">
    <label for="ContactName" class="form-label">Name</label>
    <input
      type="text"
      id="ContactName"
      name="name"
      class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
      value="<?= h($values['name']) ?>"
      required
      maxlength="80"
    >
    <?php if (!empty($errors['name'])): ?>
      <div class="invalid-feedback"><?= h($errors['name']) ?></div>
    <?php endif; ?>
  </div>

  <div class="mb-3">
    <label for="ContactEmail" class="form-label">Email</label>
    <input
      type="email"
      id="ContactEmail"
      name="email"
      class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
      value="<?= h($values['email']) ?>"
      required
      maxlength="254"
    >
    <?php if (!empty($errors['email'])): ?>
      <div class="invalid-feedback"><?= h($errors['email']) ?></div>
    <?php endif; ?>
  </div>

  <div class="mb-3">
    <label for="ContactMessage" class="form-label">Message</label>
    <textarea
      id="ContactMessage"
      name="message"
      rows="6"
      class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
      required
      maxlength="2000"
    ><?= h($values['message']) ?></textarea>
    <?php if (!empty($errors['message'])): ?>
      <div class="invalid-feedback"><?= h($errors['message']) ?></div>
    <?php endif; ?>
  </div>

  <button class="btn btn-primary" id="SendButton">Send</button>
</form>

<?php include __DIR__ . '/share/footer.php'; ?>
