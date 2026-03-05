<?php
require_once __DIR__ . '/../core/functions.php';
require_admin();
$title = 'Users (Admin)';
$users = require __DIR__ . '/../core/users.php';
include __DIR__ . '/../share/header.php';
?>

<h2 class="mb-3">Users</h2>
<div class="alert alert-info">
  As credenciais estão guardadas em <code>core/users.php</code>.
</div>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $u): ?>
      <tr>
        <td><?= h($u['username'] ?? '') ?></td>
        <td><?= h($u['role'] ?? 'user') ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../share/footer.php'; ?>
