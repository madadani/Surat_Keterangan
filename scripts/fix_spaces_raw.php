<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "Running raw SQL update to trim spaces..." . PHP_EOL;

$affected = DB::update("UPDATE surat_keterangan SET tipe_berkas = TRIM(tipe_berkas)");

echo "Done. Affected rows: {$affected}" . PHP_EOL;
