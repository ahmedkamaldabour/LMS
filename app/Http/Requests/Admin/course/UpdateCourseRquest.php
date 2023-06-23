<?php

namespace App\Http\Requests\Admin\course;

use App\Http\Services\LocalizationService;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use function array_merge;
use function request;

class UpdateCourseRquest extends FormRequest
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
        return array_merge($translatable_rules,Course::rules(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
                'intro' => 'nullable|mimes:mp4,mov,ogg,qt|max:10240',
            ]
        );
    }
}
