<?php
// Script debug SANGAT SEDERHANA - tanpa Laravel bootstrap
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/plain; charset=utf-8');

echo "=== DEBUG SEDERHANA ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";

// Cek koneksi database langsung
$host = '127.0.0.1';
$db = 'db_suket';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database: TERHUBUNG\n\n";

    // Cek kolom tabel prices
    $stmt = $pdo->query("SHOW COLUMNS FROM prices");
    $cols = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Kolom tabel 'prices': " . implode(', ', $cols) . "\n";
    echo "max_price ada: " . (in_array('max_price', $cols) ? 'YA' : 'TIDAK - PERLU MIGRASI!') . "\n\n";

    // Cek kolom tabel pendaftar
    $stmt = $pdo->query("SHOW COLUMNS FROM pendaftar");
    $cols = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Kolom tabel 'pendaftar': " . implode(', ', $cols) . "\n\n";

    // Cek status migrasi
    $stmt = $pdo->query("SELECT migration FROM migrations ORDER BY id DESC LIMIT 10");
    $migrations = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "10 Migrasi terakhir:\n";
    foreach ($migrations as $m) {
        echo "  - $m\n";
    }

    $needMigration = '2026_02_13_025936_add_max_price_to_prices_table';
    echo "\nMigrasi max_price sudah dijalankan: " . (in_array($needMigration, $migrations) ? 'YA' : 'TIDAK - JALANKAN: php artisan migrate') . "\n";

    // Cek jumlah pendaftar
    $stmt = $pdo->query("SELECT COUNT(*) FROM pendaftar");
    echo "\nJumlah pendaftar: " . $stmt->fetchColumn() . "\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

echo "\n=== SELESAI ===\n";
