<?php

namespace App\Http\Requests\Admin\examQuestions;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamQuestionRequest extends FormRequest
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
            'exam_id' => 'required|exists:exams,id',
            'question' => 'required|min:3|max:20000',
            'question_image' => 'required|mimes:jpg,png,svg,webp,jpeg|max:5000',
            'active' => 'nullable'
        ];
    }
}
