<?php
require_once __DIR__ . '/functions.php';

const SYN_FILE = __DIR__ . '/../data/synthetics.json';

function syn_load(): array {
    if (!file_exists(SYN_FILE)) return [];
    $json = file_get_contents(SYN_FILE);
    $data = json_decode($json, true);
    return is_array($data) ? $data : [];
}

function syn_save(array $all): bool {
    // sort by id for consistency
    usort($all, fn($a,$b) => ($a['id'] ?? 0) <=> ($b['id'] ?? 0));
    $json = json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    return (bool)file_put_contents(SYN_FILE, $json);
}

function syn_next_id(array $all): int {
    $max = 0;
    foreach ($all as $it) {
        $max = max($max, (int)($it['id'] ?? 0));
    }
    return $max + 1;
}

function syn_validate(array $in, array &$errors): array {
    $allowed_types = ['Acceleration','Melee','Firearm'];

    $out = [
        'section' => sanitize_string($in['section'] ?? ''),
        'type' => sanitize_string($in['type'] ?? ''),
        'brand' => sanitize_string($in['brand'] ?? ''),
        'model' => sanitize_string($in['model'] ?? ''),
        'image' => sanitize_path($in['image'] ?? ''),
        'detail_url' => sanitize_path($in['detail_url'] ?? ''),
    ];

    $errors = [];

    if ($out['section'] === '') $errors['section'] = 'Section obrigatória';
    if (!in_array($out['type'], $allowed_types, true)) $errors['type'] = 'Tipo inválido';
    if ($out['brand'] === '') $errors['brand'] = 'Brand obrigatória';
    if ($out['model'] === '') $errors['model'] = 'Model obrigatória';

    if ($out['image'] === '') {
        $errors['image'] = 'Imagem obrigatória';
    } elseif (!preg_match('/^Images\/[A-Za-z0-9 ._\-]+\.(?:png|jpg|jpeg|gif|webp)$/i', $out['image'])) {
        $errors['image'] = 'Imagem inválida (ex: Images/ficheiro.png)';
    }

    if ($out['detail_url'] === '') {
        $errors['detail_url'] = 'URL detalhe obrigatório';
    } elseif (!preg_match('/^[A-Za-z0-9][A-Za-z0-9_\-]*\.php$/', $out['detail_url'])) {
        $errors['detail_url'] = 'Página de detalhe inválida (ex: TESSERACT_PE301C.php)';
    }

    return $out;
}

function syn_add(array $data): bool {
    $items = syn_load();
    $data['id'] = syn_next_id($items);
    $items[] = $data;
    return syn_save($items);
}

function syn_find(int $id): ?array {
    foreach (syn_load() as $it) if ((int)$it['id'] === $id) return $it;
    return null;
}

function syn_update(int $id, array $data): bool {
    $items = syn_load();
    foreach ($items as &$it) {
        if ((int)$it['id'] === $id) {
            $data['id'] = $id;
            $it = $data;
            return syn_save($items);
        }
    }
    return false;
}

function syn_delete(int $id): bool {
    $items = array_values(array_filter(syn_load(), fn($it) => (int)$it['id'] !== $id));
    return syn_save($items);
}
