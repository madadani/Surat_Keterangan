<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    public function run()
    {
        $tests = [
            'Kesehatan',
            'Kesehatan Jiwa',
            'Bebas Narkoba',
            'THT',
            'Mata',
            'Orthopedi',
            'Paru',
            'Dalam',
            'Gigi',
            'Jantung',
            'Resume MCU',
            'TKHI'
        ];

        foreach ($tests as $test) {
            Price::updateOrCreate(
                ['test_name' => $test],
                ['price' => 0]
            );
        }
    }
}
