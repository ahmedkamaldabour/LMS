<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
use function rand;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition(): array
    {
        (Admin::count() == 0) ? ($admin = Admin::factory()->create()) : ($admin = Admin::first());
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'start' => $this->faker->dateTime,
            'end' => $this->faker->dateTime,
            'time' => $this->faker->time,
            'degree' => 50,
            'exam_type' => 'Choices',
            'active' => false,
            'close' => false,
            'limit_questions' => $this->faker->numberBetween(10, 40),
            'auto_answer' => false,
            'admin_id' => $admin->id
        ];
    }
}
