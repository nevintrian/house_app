<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'name' => 'Mitra 1',
            'image' => 'images/no-image.jpeg',
            'status' => 1
        ]);

        Mitra::create([
            'name' => 'Mitra 2',
            'image' => 'images/no-image.jpeg',
            'status' => 0
        ]);
    }
}
