<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(DocumentationSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
