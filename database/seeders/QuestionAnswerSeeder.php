<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionAnswer::factory()->count(10)->create();
    }
}
