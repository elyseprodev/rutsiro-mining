<?php
/**
 * RUTSIRO MINING LTD — Database connection (Phase 1 / Phase 8)
 * MySQL via PDO prepared statements. No external dependencies (XAMPP-friendly).
 * Reads config/.env if present, otherwise uses XAMPP defaults.
 */
declare(strict_types=1);

function loadEnv(string $path): void {
    if (!is_file($path)) return;
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) continue;
        [$k, $v] = explode('=', $line, 2);
        $k = trim($k); $v = trim($v, " \t\n\r\0\x0B\"'");
        if (getenv($k) === false) putenv("$k=$v");
    }
}
loadEnv(__DIR__ . '/.env');

function getDB(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;

    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME') ?: 'rutsiro_mining_db';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';

    $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, // real prepared statements
    ]);
    return $pdo;
}

/** Non-fatal check used by Phase 1 placeholder pages (DB tables arrive in Phase 8). */
function dbAvailable(): bool {
    try { getDB()->query('SELECT 1'); return true; }
    catch (Throwable $e) { return false; }
}
