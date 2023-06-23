<?php

namespace App\Http\Requests\Admin\Lessons;

use App\Http\Services\LocalizationService;
use App\Models\Lesson;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
        $rules['file'] = 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,text,txt';
        $rules['video'] = 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm,mov,qt,mkv';


        // check if lesson type changed if it changed then make new type required
        if ($this->type != $this->lesson->type && $this->type != 'text') {
            $rules[$this->type] = 'required';
        }
        $translatableData = Lesson::$translatableData;
        $data = LocalizationService::getModelRules($translatableData);
        return array_merge($rules, $data);

    }
}
