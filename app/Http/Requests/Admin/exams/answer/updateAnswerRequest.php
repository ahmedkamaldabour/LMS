<?php

namespace App\Http\Requests\Admin\exams\answer;
use App\Models\QuestionAnswer;
use App\Http\Services\LocalizationService;
use Illuminate\Foundation\Http\FormRequest;

class updateAnswerRequest extends FormRequest
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
            'answer' => 'required|min:2',
            'correct' => 'nullable',
        ];

    }
}
