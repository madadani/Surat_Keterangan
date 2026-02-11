<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeterangan extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan';

    protected $fillable = [
        'pendaftar_id',
        'tipe_berkas',
        'pekerjaan',
        'pendidikan',
        'pada_tanggal',
        'tinggi_badan',
        'berat_badan',
        'tensi',
        'nadi',
        'suhu',
        'respirasi',
        'buta_warna',
        'keperluan',
        'nomor_surat',
        'hasil_pemeriksaan',
        'morphine',
        'canabinoid',
        'amphetamine',
        'benzodiazepine',
        'metamfetamin',
        'cocaine',
        'saran',
        'kesimpulan',
        'visus_kanan',
        'visus_kiri',
        'segmen_anterior',
        'golongan_darah',
        'tes_bisik',
        'telinga_kiri',
        'telinga_kanan',
        'hidung',
        'tenggorokan',
        'tindakan_gigi',
        'kontrol_ulang',
        'dokter_id',
        'tanggal_cetak',
        'perusahaan',
        'no_lab',
        'mcu_data',
        'identitas_pemeriksa',
    ];

    protected $casts = [
        'mcu_data' => 'array',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
