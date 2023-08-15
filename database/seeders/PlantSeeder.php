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
            'category_id' => '1',
            'khasiat' => 'Meredakan mual, melancarkan pencernaan',
            'latin' => 'Zingiber Officinale',
            'uniqid' => uniqid('tanaman_'),
            'deskripsi' => 'Lorem ipsum dolor sit amet'
        ]);

        Plant::create([
            'nama' => 'Kunyit',
            'category_id' => '1',
            'khasiat' => 'Anti-inflamasi, detoksifikasi liver',
            'latin' => 'Curcuma Longa',
            'uniqid' => uniqid('tanaman_'),
            'deskripsi' => 'Lorem ipsum dolor sit amet'
        ]);

        Plant::create([
            'nama' => 'Temulawak',
            'category_id' => '1',
            'khasiat' => 'Memperbaiki fungsi hati, melancarkan peredaran dar...',
            'latin' => 'Curcuma Xanthorrhiza',
            'uniqid' => uniqid('tanaman_'),
            'deskripsi' => 'Lorem ipsum dolor sit amet'
        ]);
    }
}
