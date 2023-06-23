<?php

namespace Database\Factories;

use App\Models\ExamQuestions;
use App\Models\QuestionAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionAnswerFactory extends Factory
{
    protected $model = QuestionAnswer::class;

    public function definition(): array
    {
        $exam_question = ExamQuestions::first();
        return [
            "exam_question_id" => $exam_question->id,
            "answer" => $this->faker->paragraph(6),
            "correct" => false,
        ];
    }
}
