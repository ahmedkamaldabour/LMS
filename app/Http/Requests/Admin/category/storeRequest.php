<?php

namespace App\Http\Requests\Admin\category;

use App\Http\Services\LocalizationService;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class storeRequest extends FormRequest
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
        return LocalizationService::getModelRules(Category::$translatableData);
    }
}
