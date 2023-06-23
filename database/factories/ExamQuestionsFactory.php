<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamQuestions;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamQuestionsFactory extends Factory
{
    protected $model = ExamQuestions::class;

    public function definition(): array
    {
        $exam = Exam::first();
        return [
            "exam_id" => $exam->id,
            "question" => $this->faker->paragraph(5),
            "question_image" => "question_image.png",
            "active" => true
        ];
    }
}
