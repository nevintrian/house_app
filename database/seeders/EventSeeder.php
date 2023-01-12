<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Event 1',
            'image' => 'images/no-image.jpeg',
            'slug' => 'event-1',
            'description' => 'ini adalah deskripsi event 1',
            'status' => 1
        ]);

        Event::create([
            'name' => 'Event 2',
            'image' => 'images/no-image.jpeg',
            'slug' => 'event-2',
            'description' => 'ini adalah deskripsi event 2',
            'status' => 0
        ]);
    }
}
