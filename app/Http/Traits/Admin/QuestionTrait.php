<?php

namespace App\Http\Traits\Admin;
use App\Models\ExamQuestions;

trait QuestionTrait
{
    private function getQuestions()
    {
        return ExamQuestions::get(['id', 'question']);
    }
}
