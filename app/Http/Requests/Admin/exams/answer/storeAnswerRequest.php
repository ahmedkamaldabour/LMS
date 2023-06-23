<?php

namespace App\Http\Requests\Admin\exams\answer;

use App\Http\Services\LocalizationService;
use App\Models\QuestionAnswer;
use Illuminate\Foundation\Http\FormRequest;

class storeAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
//        return LocalizationService::getModelRules(QuestionAnswer::$translatableData);
        return [
//            'exam_question_id' => 'required|exists:exam_questions,id',
            'answer' => 'required|min:2',
            'correct' => 'required|in:0,1',
        ];
    }
}
