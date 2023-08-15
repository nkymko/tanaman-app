<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama' => 'Tanaman Obat'
        ]);

        Category::create([
            'nama' => 'Tanaman Sayur'
        ]);

        Category::create([
            'nama' => 'Tanaman Buah'
        ]);

        Category::create([
            'nama' => 'Tanaman Pangan'
        ]);

        Category::create([
            'nama' => 'Tanaman Umbi'
        ]);
    }
}
