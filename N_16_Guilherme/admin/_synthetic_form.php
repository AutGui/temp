<?php /** @var array $values @var array $errors @var string $action_label */ ?>
<input type="hidden" name="csrf_token" value="<?= h(csrf_token()) ?>">
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Section</label>
    <input type="text" name="section" class="form-control" value="<?= h($values['section'] ?? '') ?>" required>
    <?php if(!empty($errors['section'])): ?><div class="text-danger small"><?= h($errors['section']) ?></div><?php endif; ?>
  </div>
  <div class="col-md-6">
    <label class="form-label">Type</label>
    <select name="type" class="form-select" required>
      <?php foreach(['Acceleration','Melee','Firearm'] as $opt): ?>
        <option value="<?= h($opt) ?>" <?= (($values['type'] ?? '')===$opt?'selected':'') ?>><?= h($opt) ?></option>
      <?php endforeach; ?>
    </select>
    <?php if(!empty($errors['type'])): ?><div class="text-danger small"><?= h($errors['type']) ?></div><?php endif; ?>
  </div>
  <div class="col-md-6">
    <label class="form-label">Brand</label>
    <input type="text" name="brand" class="form-control" value="<?= h($values['brand'] ?? '') ?>" required>
    <?php if(!empty($errors['brand'])): ?><div class="text-danger small"><?= h($errors['brand']) ?></div><?php endif; ?>
  </div>
  <div class="col-md-6">
    <label class="form-label">Model</label>
    <input type="text" name="model" class="form-control" value="<?= h($values['model'] ?? '') ?>" required>
    <?php if(!empty($errors['model'])): ?><div class="text-danger small"><?= h($errors['model']) ?></div><?php endif; ?>
  </div>
  <div class="col-md-6">
    <label class="form-label">Image path (relative)</label>
    <input type="text" name="image" class="form-control" value="<?= h($values['image'] ?? '') ?>" placeholder="Images/xxx.png" required>
    <?php if(!empty($errors['image'])): ?><div class="text-danger small"><?= h($errors['image']) ?></div><?php endif; ?>
  </div>
  <div class="col-md-6">
    <label class="form-label">Detail page URL (relative)</label>
    <input type="text" name="detail_url" class="form-control" value="<?= h($values['detail_url'] ?? '') ?>" placeholder="TESSERACT_PE301C.php" required>
    <?php if(!empty($errors['detail_url'])): ?><div class="text-danger small"><?= h($errors['detail_url']) ?></div><?php endif; ?>
  </div>
</div>
<div class="mt-3">
  <button class="btn btn-primary"><?= h($action_label ?? 'Guardar') ?></button>
  <a href="synthetics.php" class="btn btn-secondary">Cancelar</a>
</div>
