<?php
/**
 * RUTSIRO MINING LTD — Shared helpers (Phase 1 foundation)
 * Full features (auth, uploads, mail) are added in their phases.
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
        'use_strict_mode' => true,
    ]);
}

require_once __DIR__ . '/../config/database.php';

/** XSS-safe output */
function e(?string $v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

/** Redirect helper */
function redirect(string $url): void {
    header('Location: ' . $url);
    exit;
}

/* ---------- CSRF (Phase 9/11 — present from Phase 1) ---------- */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}
function csrf_verify(): bool {
    return !empty($_SESSION['csrf_token'])
        && isset($_POST['csrf_token']) && is_string($_POST['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
}

/* ---------- Language (Phase 3 — minimal loader now) ---------- */
function currentLang(): string {
    $l = $_SESSION['lang'] ?? ($_COOKIE['lang'] ?? 'en');
    return in_array($l, ['en', 'rw'], true) ? $l : 'en';
}
function lang(string $key, string $default = ''): string {
    static $dict = null;
    if ($dict === null) {
        $file = __DIR__ . '/../languages/' . currentLang() . '.json';
        $dict = is_file($file) ? (json_decode((string)file_get_contents($file), true) ?: []) : [];
    }
    // Flat keys like "nav.home" stored as nested arrays
    $parts = explode('.', $key); $cur = $dict;
    foreach ($parts as $p) {
        if (!is_array($cur) || !array_key_exists($p, $cur)) return $default !== '' ? $default : $key;
        $cur = $cur[$p];
    }
    return is_string($cur) ? $cur : $default;
}

/* ---------- Admin auth stubs (Phase 10) ---------- */
function isLoggedIn(): bool { return !empty($_SESSION['admin_id']); }
function requireAdmin(): void {
    if (!isLoggedIn()) redirect('/rutsiro-mining/admin/login.php');
}
