<?php

namespace App\Http\Requests\Admin\Lessons;

use App\Http\Services\LocalizationService;
use App\Models\Lesson;
use Illuminate\Foundation\Http\FormRequest;

class CreateLessonRequest extends FormRequest
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
        $rules = Lesson::$rules;
        $translatableData = Lesson::$translatableData;
        $data = LocalizationService::getModelRules($translatableData);

        return array_merge($rules, $data);


    }

}
