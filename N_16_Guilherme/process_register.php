<?php
require_once __DIR__ . '/core/functions.php';

csrf_check('register.php');

if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}

$username = sanitize_string($_POST['username'] ?? '');

$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';
if (!is_string($password)) $password = '';
if (!is_string($confirm)) $confirm = '';

$errors = [];

if ($username === '') {
    $errors[] = 'Preencha o username.';
} elseif (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) {
    $errors[] = 'Username inválido. Use 3–20 caracteres (letras, números e underscore).';
}

if ($password === '') {
    $errors[] = 'Preencha a password.';
} elseif (strlen($password) < 6) {
    $errors[] = 'Password demasiado curta (mínimo 6 caracteres).';
}

if ($confirm === '') {
    $errors[] = 'Confirme a password.';
} elseif ($password !== $confirm) {
    $errors[] = 'As passwords não coincidem.';
}

$users_file = __DIR__ . '/core/users.php';
$users = require $users_file;

// Check if username already exists (core/users.php)
foreach ($users as $u) {
    $existing = $u['username'] ?? '';
    if (is_string($existing) && strcasecmp($existing, $username) === 0) {
        $errors[] = 'Esse username já existe. Escolhe outro.';
        break;
    }
}

if ($errors) {
    $_SESSION['error'] = implode(' ', $errors);
    $_SESSION['old_username'] = $username;
    redirect('register.php');
}

// Add user to the users array (and then persist it back into core/users.php)
$users[] = [
    'username' => $username,
    'password' => $password, // plain-text for now
    'role' => 'user',
];

function php_export_short(mixed $value, int $indent = 0): string {
    $pad = str_repeat('    ', $indent);

    if (!is_array($value)) {
        return var_export($value, true);
    }

    if ($value === []) {
        return '[]';
    }

    $out = "[\r\n";
    $pad2 = str_repeat('    ', $indent + 1);

    if (array_is_list($value)) {
        foreach ($value as $v) {
            $out .= $pad2 . php_export_short($v, $indent + 1) . ",\r\n";
        }
    } else {
        foreach ($value as $k => $v) {
            $out .= $pad2 . var_export($k, true) . ' => ' . php_export_short($v, $indent + 1) . ",\r\n";
        }
    }

    $out .= $pad . ']';
    return $out;
}

$php = "<?php\r\n";
$php .= "// Users stored directly in PHP (this file).\r\n";
$php .= "// NOTE: process_register.php updates this file when someone registers.\r\n";
$php .= 'return ' . php_export_short($users) . ";\r\n";

if (file_put_contents($users_file, $php, LOCK_EX) === false) {
    $_SESSION['error'] = 'Falha ao guardar o utilizador. Verifica permissões em core/users.php.';
    $_SESSION['old_username'] = $username;
    redirect('register.php');
}

$_SESSION['success'] = 'Conta criada com sucesso. Agora podes fazer login.';
redirect('login.php');
