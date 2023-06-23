<?php

namespace App\Http\Requests\Admin;

use App\Http\Services\LocalizationService;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rule = Post::$rule;
        $translatableData = Post::$translatableData;
        $data = LocalizationService::getModelRules($translatableData);
        return array_merge($data , $rule);
    }
}
