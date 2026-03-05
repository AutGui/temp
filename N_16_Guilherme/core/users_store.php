<?php
require_once __DIR__ . '/functions.php';

const USERS_FILE = __DIR__ . '/../data/users.json';

function users_load(): array {
    if (!file_exists(USERS_FILE)) return [];

    $json = file_get_contents(USERS_FILE);
    $data = json_decode($json, true);
    if (!is_array($data)) return [];

    $out = [];
    $seen = [];

    foreach ($data as $u) {
        if (!is_array($u)) continue;

        $username = $u['username'] ?? '';
        $password = $u['password'] ?? '';
        $role = $u['role'] ?? 'user';

        if (!is_string($username) || $username === '') continue;
        if (!is_string($password) || $password === '') continue;

        if (!is_string($role) || !in_array($role, ['user', 'admin'], true)) {
            $role = 'user';
        }

        $key = strtolower($username);
        if (isset($seen[$key])) continue;
        $seen[$key] = true;

        $out[] = [
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ];
    }

    return $out;
}

function users_save(array $users): bool {
    // Keep only valid entries and deduplicate by username.
    $clean = [];
    $seen = [];

    foreach ($users as $u) {
        if (!is_array($u)) continue;

        $username = $u['username'] ?? '';
        $password = $u['password'] ?? '';
        $role = $u['role'] ?? 'user';

        if (!is_string($username) || $username === '') continue;
        if (!is_string($password) || $password === '') continue;

        if (!is_string($role) || !in_array($role, ['user', 'admin'], true)) {
            $role = 'user';
        }

        $key = strtolower($username);
        if (isset($seen[$key])) continue;
        $seen[$key] = true;

        $clean[] = [
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ];
    }

    // Sort for consistency.
    usort($clean, fn($a, $b) => strcasecmp($a['username'], $b['username']));

    $json = json_encode($clean, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if ($json === false) return false;

    return file_put_contents(USERS_FILE, $json, LOCK_EX) !== false;
}
