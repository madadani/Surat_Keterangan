<?php

use App\Models\SuratKeterangan;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting migration of letter numbers to Roman numerals..." . PHP_EOL;

$romans = [
    1 => 'I',
    2 => 'II',
    3 => 'III',
    4 => 'IV',
    5 => 'V',
    6 => 'VI',
    7 => 'VII',
    8 => 'VIII',
    9 => 'IX',
    10 => 'X',
    11 => 'XI',
    12 => 'XII'
];

$count = 0;
SuratKeterangan::all()->each(function ($s) use ($romans, &$count) {
    // Current format examples: 
    // 1008/RSUD/GML/02/2026
    // 001/RSUD/GML/2/2026

    if (preg_match('/\/RSUD\/GML\/(\d{1,2})\/(\d{4})$/', $s->nomor_surat, $matches)) {
        $month = (int) $matches[1];
        $year = $matches[2];

        if (isset($romans[$month])) {
            $romanMonth = $romans[$month];
            $newNomor = preg_replace('/\/RSUD\/GML\/\d{1,2}\/\d{4}$/', '/RSUD/GML/' . $romanMonth . '/' . $year, $s->nomor_surat);

            if ($s->nomor_surat !== $newNomor) {
                echo "Updating {$s->nomor_surat} to {$newNomor}" . PHP_EOL;
                $s->update(['nomor_surat' => $newNomor]);
                $count++;
            }
        }
    }
});

echo "Migration finished. Total records updated: {$count}" . PHP_EOL;
