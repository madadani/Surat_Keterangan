<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SuratKeterangan;
use Illuminate\Support\Facades\DB;

$counts = SuratKeterangan::select('tipe_berkas', DB::raw('count(*) as total'))
    ->groupBy('tipe_berkas')
    ->get();

foreach ($counts as $count) {
    echo "{$count->tipe_berkas}: {$count->total}\n";
}
