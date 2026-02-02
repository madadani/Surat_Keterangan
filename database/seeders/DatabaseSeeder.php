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
        \App\Models\User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin'),
            ]
        );

        // Seed Prices
        $this->call(PriceSeeder::class);

        // Sample Dokter
        \App\Models\Dokter::create([
            'nama_dokter' => 'dr. WIYOSA WALUYAN RUSDI, Sp.PD',
            'nip' => '19870211 201503 1 002',
            'spesialis' => 'Penyakit Dalam',
        ]);
    }
}
