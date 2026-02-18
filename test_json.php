<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Pendaftar;
use App\Models\Price;
use Yajra\DataTables\Facades\DataTables;

try {
    $query = Pendaftar::query()->latest();
    echo "Query OK. Total records: " . $query->count() . PHP_EOL;

    // Test price lookup
    $first = Pendaftar::first();
    if ($first) {
        echo "First pendaftar: " . $first->nama_lengkap . PHP_EOL;
        echo "Keperluan: " . $first->keperluan . PHP_EOL;
        echo "Jenis test: " . $first->jenis_test . PHP_EOL;

        $price = Price::where('test_name', 'LIKE', $first->keperluan)->first();
        echo "Price found: " . ($price ? $price->price : 'NULL') . PHP_EOL;
    }

    // Test DataTables
    $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
    $_GET['draw'] = 1;
    $_GET['start'] = 0;
    $_GET['length'] = 10;
    $_GET['search'] = ['value' => '', 'regex' => 'false'];
    $_GET['order'] = [['column' => 0, 'dir' => 'asc']];
    $_GET['columns'] = [
        ['data' => 'id', 'name' => 'id', 'searchable' => 'true', 'orderable' => 'true', 'search' => ['value' => '', 'regex' => 'false']],
    ];

    $result = DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('estimasi_biaya', function ($row) {
            return ['min' => 0, 'max' => 0];
        })
        ->make(true);

    echo "DataTables OK!" . PHP_EOL;
    echo "Response: " . substr($result->getContent(), 0, 200) . PHP_EOL;

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . PHP_EOL;
    echo "File: " . $e->getFile() . ":" . $e->getLine() . PHP_EOL;
    echo "Trace: " . $e->getTraceAsString() . PHP_EOL;
}
