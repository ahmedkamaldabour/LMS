<?php

namespace App\Http\Requests\Admin\course;

use App\Http\Services\LocalizationService;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRquest extends FormRequest
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
        $translatable_rules = LocalizationService::getModelRules(Course::$translatableData);
        return array_merge($translatable_rules, Course::rules(),
            [
                'image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
                'intro' => 'required|mimes:mp4,mov,ogg,qt|max:102400',
            ]
        );
    }
}
