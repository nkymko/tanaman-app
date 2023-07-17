<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::create([
            'nama' => 'Jahe',
            'khasiat' => 'Meredakan mual, melancarkan pencernaan',
            'latin' => 'Zingiber Officinale',
            'uniqid' => uniqid('tanaman_'),
        ]);

        Plant::create([
            'nama' => 'Kunyit',
            'khasiat' => 'Anti-inflamasi, detoksifikasi liver',
            'latin' => 'Curcuma Longa',
            'uniqid' => uniqid('tanaman_'),
        ]);

        Plant::create([
            'nama' => 'Temulawak',
            'khasiat' => 'Memperbaiki fungsi hati, melancarkan peredaran dar...',
            'latin' => 'Curcuma Xanthorrhiza',
            'uniqid' => uniqid('tanaman_'),
        ]);
    }
}
