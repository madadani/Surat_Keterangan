<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'no_registrasi',
        'no_rm',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'pendidikan',
        'jenis_kelamin',
        'alamat',
        'perusahaan',
        'no_hp',
        'tinggi_badan',
        'berat_badan',
        'keperluan',
        'jenis_test',
        'status',
    ];

    public function suratKeterangan()
    {
        return $this->hasMany(SuratKeterangan::class, 'pendaftar_id');
    }
}
