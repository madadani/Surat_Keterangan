<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SuratKeterangan;
use App\Models\Price;

$known = Price::pluck('test_name')->toArray();
$surats = SuratKeterangan::all();

echo "HEX DUMP OF TIPE_BERKAS:" . PHP_EOL;
foreach ($surats as $s) {
    echo "ID {$s->id}: [" . $s->tipe_berkas . "] HEX: " . bin2hex($s->tipe_berkas) . " LEN: " . strlen($s->tipe_berkas);
    if (in_array($s->tipe_berkas, $known)) {
        echo " [MATCH]";
    } else {
        echo " [MISMATCH]";
    }
    echo PHP_EOL;
}
