<?php
require_once __DIR__ . '/core/functions.php';

csrf_check();

$username = sanitize_string($_POST['username'] ?? '');

$password = $_POST['password'] ?? '';
if (!is_string($password)) $password = '';

if ($username === '' || $password === '') {
    $_SESSION['error'] = 'Preencha todos os campos do formulario.';
    redirect('login.php');
}

$users = require __DIR__ . '/core/users.php';
foreach ($users as $u) {
    $u_name = $u['username'] ?? '';
    $u_pass = $u['password'] ?? '';

    if (!is_string($u_name) || !is_string($u_pass)) continue;

    $match_user = (strcasecmp($u_name, $username) === 0);

    // Passwords can be plain-text OR a hash (legacy).
    $match_pass = ($u_pass === $password);

    // Backward compatibility: allow hashes that existed from a previous version.
    if (!$match_pass && (str_starts_with($u_pass, '$2y$') || str_starts_with($u_pass, '$argon2'))) {
        $match_pass = password_verify($password, $u_pass);
    }

    if ($match_user && $match_pass) {
        session_regenerate_id(true);
        $_SESSION['user'] = $u_name;
        $_SESSION['role'] = $u['role'] ?? 'user';
        redirect('dashboard.php');
    }
}

$_SESSION['error'] = 'Utilizador ou password inválidos.';
redirect('login.php');
