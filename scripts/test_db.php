<?php
$conn = new mysqli('localhost', 'root', '', 'db_suket');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connect success!\n";

$result = $conn->query("SELECT tipe_berkas, COUNT(*) as total FROM surat_keterangan GROUP BY tipe_berkas");
while ($row = $result->fetch_assoc()) {
    echo "{$row['tipe_berkas']}: {$row['total']}\n";
}

$result = $conn->query("SELECT COUNT(*) as total FROM surat_keterangan WHERE tanggal_cetak IS NULL OR tanggal_cetak = ''");
$row = $result->fetch_assoc();
echo "Records with empty tanggal_cetak: {$row['total']}\n";

$conn->close();
