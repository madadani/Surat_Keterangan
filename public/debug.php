<?php
// Script debug sementara - HAPUS SETELAH SELESAI
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

header('Content-Type: text/plain; charset=utf-8');

echo "=== DEBUG SERVER ===\n\n";
echo "PHP Version: " . PHP_VERSION . "\n";

// 1. Cek koneksi DB
try {
    DB::connection()->getPdo();
    echo "Database: CONNECTED\n";
} catch (\Exception $e) {
    echo "Database ERROR: " . $e->getMessage() . "\n";
    exit;
}

// 2. Cek kolom tabel prices
echo "\nKolom tabel 'prices': ";
try {
    $cols = Schema::getColumnListing('prices');
    echo implode(', ', $cols) . "\n";
    echo "max_price ada: " . (in_array('max_price', $cols) ? 'YA' : 'TIDAK - PERLU MIGRASI!') . "\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

// 3. Cek kolom tabel pendaftar
echo "\nKolom tabel 'pendaftar': ";
try {
    $cols = Schema::getColumnListing('pendaftar');
    echo implode(', ', $cols) . "\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

// 4. Cek status migrasi
echo "\nStatus migrasi:\n";
try {
    $migrations = DB::table('migrations')->pluck('migration')->toArray();
    $needMigration = '2026_02_13_025936_add_max_price_to_prices_table';
    echo "Migrasi max_price sudah dijalankan: " . (in_array($needMigration, $migrations) ? 'YA' : 'TIDAK - PERLU php artisan migrate') . "\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

// 5. Test query DataTables
echo "\nTest query DataTables:\n";
try {
    $count = \App\Models\Pendaftar::count();
    echo "Jumlah pendaftar: $count\n";

    // Test price query
    $price = \App\Models\Price::first();
    if ($price) {
        echo "Price pertama: " . $price->test_name . " = " . $price->price . "\n";
        echo "max_price: " . ($price->max_price ?? 'NULL') . "\n";
    } else {
        echo "Tabel prices kosong\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "\n=== SELESAI ===\n";
