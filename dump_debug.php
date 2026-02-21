<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$prices = \App\Models\Price::all();
$rawStats = \App\Models\SuratKeterangan::select('tipe_berkas', \DB::raw('count(*) as total'))
    ->groupBy('tipe_berkas')
    ->get()
    ->pluck('total', 'tipe_berkas')
    ->toArray();

echo "--- SIMULASI STATS BARU ---\n";
foreach ($prices as $p) {
    $name = $p->test_name;
    $count = $rawStats[$name] ?? 0;
    $altName = strpos($name, 'Kesehatan ') === 0 ? str_replace('Kesehatan ', '', $name) : 'Kesehatan ' . $name;
    $count += $rawStats[$altName] ?? 0;
    if ($name == 'Resume MCU')
        $count += $rawStats['MCU'] ?? 0;

    if ($count > 0 || $name == 'Resume MCU') {
        echo sprintf("%-25s : %d surat\n", $name, $count);
    }
}
echo "\n--- RAW DATABASE COUNTS ---\n";
foreach ($rawStats as $k => $v) {
    echo "[$k] : $v\n";
}
