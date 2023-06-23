<?php

namespace App\Http\Requests\exam;

use App\Models\Exam;
use Illuminate\Foundation\Http\FormRequest;
use function array_merge;

class StoreExamReqeuest extends FormRequest
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
        return array_merge(
            ['name' => 'required|string|min:3|max:255|unique:exams,name'],
            Exam::rules()
        );
    }
}
