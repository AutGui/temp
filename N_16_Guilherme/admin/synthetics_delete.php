<?php
require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/synthetics.php';
require_admin();
csrf_check();
$id = (int)($_POST['id'] ?? 0);
if ($id > 0) {
    syn_delete($id);
}
redirect('synthetics.php');
