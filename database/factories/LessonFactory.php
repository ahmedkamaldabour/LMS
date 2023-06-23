<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        return [
            'title' => [
                'en' => $this->faker->word,
                'es' => $this->faker->word
            ],
            'course_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['video', 'text', 'file']),
            'time' => $this->faker->numberBetween(1, 10),
            'body' => $this->faker->paragraph(2),
        ];
    }
}
