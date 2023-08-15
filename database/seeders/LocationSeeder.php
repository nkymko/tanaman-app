<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'nama' => 'Walkotfarm'
        ]);

        Location::create([
            'nama' => 'Samping Greenhouse'
        ]);

        Location::create([
            'nama' => 'Rooftop'
        ]);

        Location::create([
            'nama' => 'Taman Hatinya PKK'
        ]);
    }
}
