<?php
require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/synthetics.php';
require_admin();
$id = (int)($_GET['id'] ?? 0);
$orig = syn_find($id);
if (!$orig) { http_response_code(404); echo 'Not found'; exit; }
$title = 'Editar Synthetic #'.$id;
$values = $orig; $errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $values = syn_validate($_POST, $errors);
    if (!$errors) {
        if (syn_update($id, $values)) {
            redirect('synthetics.php');
        } else {
            $errors['global'] = 'Falha ao atualizar o registo.';
        }
    }
}
include __DIR__ . '/../share/header.php';
?>
<h2 class="mb-3">Editar Synthetic #<?= (int)$id ?></h2>
<?php if(!empty($errors['global'])): ?><div class="alert alert-danger"><?= h($errors['global']) ?></div><?php endif; ?>
<form method="POST" class="card p-4 shadow-sm">
  <?php $action_label = 'Guardar'; include __DIR__ . '/_synthetic_form.php'; ?>
</form>
<?php include __DIR__ . '/../share/footer.php'; ?>