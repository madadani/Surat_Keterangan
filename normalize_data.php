<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SuratKeterangan;
use App\Models\Price;

$prices = Price::pluck('test_name')->toArray();
$surats = SuratKeterangan::all();

echo "Starting normalization..." . PHP_EOL;
$count = 0;

foreach ($surats as $surat) {
    $old = $surat->tipe_berkas;
    $clean = str_replace(['Kesehatan ', 'Poli '], '', $old);

    if (in_array($clean, $prices) && $clean != 'Jiwa') {
        $surat->update(['tipe_berkas' => $clean]);
        echo "Updated record {$surat->id}: [{$old}] -> [{$clean}]" . PHP_EOL;
        $count++;
    }
}

echo "Normalization complete. Total updated: {$count}" . PHP_EOL;
