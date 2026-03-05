<?php
require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/synthetics.php';
require_admin();
$title = 'Adicionar Synthetic';
$values = ['section'=>'','type'=>'Acceleration','brand'=>'','model'=>'','image'=>'','detail_url'=>''];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $values = syn_validate($_POST, $errors);
    if (!$errors) {
        if (syn_add($values)) {
            redirect('synthetics.php');
        } else {
            $errors['global'] = 'Falha ao guardar o registo.';
        }
    }
}

include __DIR__ . '/../share/header.php';
?>
<h2 class="mb-3">Adicionar Synthetic</h2>
<?php if(!empty($errors['global'])): ?><div class="alert alert-danger"><?= h($errors['global']) ?></div><?php endif; ?>
<form method="POST" class="card p-4 shadow-sm">
  <?php $action_label = 'Criar'; include __DIR__ . '/_synthetic_form.php'; ?>
</form>
<?php include __DIR__ . '/../share/footer.php'; ?>