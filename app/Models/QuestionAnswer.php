<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable=['exam_question_id','answer','correct'];

//    protected $casts = [
//        'correct' => 'boolean'
//    ];


//    public $translatable = ['answer'];

//    public static $translatableData = [
//        'answer' => [
//            'type' => 'text',
//            'validate' =>'required|min:2'
//        ],
//    ];

    /**
     * Get the options for generating the slug.
     */
//    public function getSlugOptions() : SlugOptions
//    {
//        return SlugOptions::create()
//            ->generateSlugsFrom('exam_question_id')
//            ->saveSlugsTo('slug');
//    }
//
//    /**
//     * Get the route key for the model.
//     *
//     * @return string
//     */
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }


    /*** TO DO RELATION WITH POSTS ***/

    public function examQuestion(): BelongsTo
    {
        return $this->belongsTo(ExamQuestions::class);
    }


}
