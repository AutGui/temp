<?php
require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/synthetics.php';
require_admin();
$title = 'Gerir Synthetics';
$items = syn_load();
include __DIR__ . '/../share/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="m-0">Synthetics</h2>
  <a class="btn btn-success" href="synthetics_new.php">Adicionar</a>
</div>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th><th>Section</th><th>Type</th><th>Brand</th><th>Model</th><th>Image</th><th>Detail</th><th style="width:140px">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $it): ?>
      <tr>
        <td><?= (int)$it['id'] ?></td>
        <td><?= h($it['section']) ?></td>
        <td><?= h($it['type']) ?></td>
        <td><?= h($it['brand']) ?></td>
        <td><?= h($it['model']) ?></td>
        <td><code><?= h($it['image']) ?></code></td>
        <td><code><?= h($it['detail_url']) ?></code></td>
        <td>
          <a class="btn btn-sm btn-warning" href="synthetics_edit.php?id=<?= (int)$it['id'] ?>">Editar</a>
          <form method="POST" action="synthetics_delete.php" class="d-inline">
            <input type="hidden" name="csrf_token" value="<?= h(csrf_token()) ?>">
            <input type="hidden" name="id" value="<?= (int)$it['id'] ?>">
            <button class="btn btn-sm btn-danger" onclick="return confirm('Remover?')">Apagar</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . '/../share/footer.php'; ?>