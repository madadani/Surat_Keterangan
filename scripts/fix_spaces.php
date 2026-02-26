<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SuratKeterangan;

$surats = SuratKeterangan::all();
$count = 0;

echo "Checking for trailing spaces..." . PHP_EOL;

foreach ($surats as $s) {
    if ($s->tipe_berkas !== trim($s->tipe_berkas)) {
        $old = $s->tipe_berkas;
        $new = trim($s->tipe_berkas);
        $s->tipe_berkas = $new;
        $s->save();
        echo "FIXED record {$s->id}: [{$old}] (len " . strlen($old) . ") -> [{$new}] (len " . strlen($new) . ")" . PHP_EOL;
        $count++;
    }
}

echo "Done. Fixed {$count} records." . PHP_EOL;
