<?php

namespace App\Http\Requests\Admin\examQuestions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamQuestionRequest extends FormRequest
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
        return [
            'exam_id' => 'nullable|exists:exams,id',
            'question' => 'nullable|min:3|max:20000',
            'question_image' => 'nullable|mimes:jpg,png,svg,webp,jpeg|max:5000',
            'active' => 'nullable'

        ];
    }
}
