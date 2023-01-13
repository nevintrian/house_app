<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::create([
            'user_id' => 2,
            'content' => 'ini adalah saran 1 user'
        ]);

        Feedback::create([
            'user_id' => 2,
            'content' => 'ini adalah saran 2 user'
        ]);
    }
}
