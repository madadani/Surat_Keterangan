<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$all = \App\Models\SuratKeterangan::with('pendaftar')->latest()->get();
$data = [];
foreach ($all as $s) {
    if (strpos($s->tipe_berkas, 'MCU') !== false || $s->tipe_berkas == 'TKHI') {
        $data[] = [
            'id' => $s->id,
            'tipe' => $s->tipe_berkas,
            'nama' => $s->pendaftar->nama_lengkap,
            'tgl_cetak' => $s->tanggal_cetak,
            'created_at' => $s->created_at->toDateTimeString(),
        ];
    }
}

file_put_contents('all_letters.json', json_encode($data, JSON_PRETTY_PRINT));
echo "DONE\n";
