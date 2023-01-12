<?php

namespace Database\Seeders;

use App\Models\Documentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documentation::create([
            'name' => 'Documentation 1',
            'image' => 'images/no-image.jpeg',
            'embed_video' => 'https://youtube.com/abc',
            'status' => 1
        ]);

        Documentation::create([
            'name' => 'Documentation 2',
            'image' => 'images/no-image.jpeg',
            'embed_video' => 'https://youtube.com/def',
            'status' => 0
        ]);
    }
}
