<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            CategorySeed::class,
            CourseSeeder::class,
            LessonSeeder::class,
            ProfileSeeder::class,
            BlogCategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ExamSeeder::class,
            ExamQuestionsSeeder::class,
            QuestionAnswerSeeder::class,
        ]);
    }
}
