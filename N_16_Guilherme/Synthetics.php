<?php
require_once __DIR__ . '/core/functions.php';
require_once __DIR__ . '/core/synthetics.php';
$title = 'Synthetics · TechnoGenesis';
$items = syn_load();
include __DIR__ . '/share/header.php';
?>
<h1 class="mb-3">Synthetics</h1>
<div class="row g-3">
<?php foreach ($items as $it): ?>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm">
      <a href="<?= h($it['detail_url']) ?>" class="text-decoration-none">
        <img src="<?= h($it['image']) ?>" class="card-img-top" alt="<?= h($it['brand'].' '.$it['model']) ?>">
      </a>
      <div class="card-body">
        <div class="small text-muted mb-1">Section: <?= h($it['section']) ?> · Type: <?= h($it['type']) ?></div>
        <h5 class="card-title mb-0"><?= h($it['brand']) ?> <span class="text-secondary"><?= h($it['model']) ?></span></h5>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php include __DIR__ . '/share/footer.php'; ?>