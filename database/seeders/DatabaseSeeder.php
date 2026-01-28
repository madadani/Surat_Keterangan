<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin user
        \App\Models\User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        // Sample Dokter
        \App\Models\Dokter::create([
            'nama_dokter' => 'dr. Andi Wijaya, Sp.PD',
            'nip' => '19870211 201503 1 002',
            'spesialis' => 'Penyakit Dalam',
        ]);

        // Sample Pendaftar
        \App\Models\Pendaftar::create([
            'no_registrasi' => 'REG-202601001',
            'nama_lengkap' => 'SABRINA KHANSA AZ ZAHRA',
            'tempat_lahir' => 'SRAGEN',
            'tanggal_lahir' => '2006-06-17',
            'jenis_kelamin' => 'Wanita',
            'alamat' => 'NGEMBAT KAMBANG RT 14 RW 05 KRAGILAN GEMOLONG SRAGEN',
            'no_hp' => '08123456789',
            'keperluan' => 'PERSYARATAN E-KTKLN',
            'jenis_test' => 'Test Kesehatan Jiwa',
            'status' => 'Pending',
        ]);
    }
}
