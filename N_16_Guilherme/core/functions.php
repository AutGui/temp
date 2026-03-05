<?php
// Common helpers and session/CSRF utilities

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function h(string $s = ""): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function sanitize_string(?string $v): string {
    if (!is_string($v)) return '';
    $v = trim($v);
    $v = strip_tags($v);
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

function sanitize_path(?string $v): string {
    // allow basic relative asset paths like Images/foo.png
    $v = sanitize_string($v);

    // forbid starting with protocol or absolute paths
    if (preg_match('/^(?:https?:\/\/|\\\\|\/)/i', $v)) {
        return '';
    }

    // basic traversal protection
    if (strpos($v, '..') !== false) {
        return '';
    }

    return $v;
}

function app_base_url(): string {
    static $base;
    if (isset($base)) {
        return $base;
    }

    $base = '';

    $root = realpath(__DIR__ . '/..');
    $script_file = $_SERVER['SCRIPT_FILENAME'] ?? '';
    $script_name = $_SERVER['SCRIPT_NAME'] ?? '';

    if ($root && is_string($script_file) && is_string($script_name) && $script_name !== '') {
        $script_file_real = realpath($script_file);
        if ($script_file_real) {
            $root_n = str_replace('\\', '/', $root);
            $script_file_n = str_replace('\\', '/', $script_file_real);
            $script_name_n = str_replace('\\', '/', $script_name);

            if (strpos($script_file_n, $root_n) === 0) {
                $rel = ltrim(substr($script_file_n, strlen($root_n)), '/');
                if ($rel !== '') {
                    $suffix = '/' . $rel;
                    if (substr($script_name_n, -strlen($suffix)) === $suffix) {
                        $base = substr($script_name_n, 0, -strlen($suffix));
                    } elseif (substr($script_name_n, -strlen($rel)) === $rel) {
                        $base = substr($script_name_n, 0, -strlen($rel));
                    }
                }
            }
        }
    }

    if ($base === '/') {
        $base = '';
    }

    return $base;
}

function url(string $path): string {
    $base = app_base_url();
    $path = ltrim($path, '/');
    return ($base !== '' ? rtrim($base, '/') : '') . '/' . $path;
}

function redirect_app(string $path): void {
    header('Location: ' . url($path));
    exit;
}

function require_login(): void {
    if (!isset($_SESSION['user'])) {
        redirect_app('login.php');
    }
}

function require_admin(): void {
    require_login();
    if (($_SESSION['role'] ?? '') !== 'admin') {
        http_response_code(403);
        echo '<h1>403 Forbidden</h1><p>Admin only.</p>';
        exit;
    }
}

function csrf_token(): string {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_check(string $redirect_to = 'login.php'): void {
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || $token !== ($_SESSION['csrf_token'] ?? '')) {
        $_SESSION['error'] = 'Token inválido.';
        redirect_app($redirect_to);
    }
}

function redirect(string $to): void {
    header('Location: ' . $to);
    exit;
}
