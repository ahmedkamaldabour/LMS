<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Lesson extends Model
{
    use HasFactory, HasSlug, HasTranslations;

    const PATH = "uploads/lessons";
    public static $translatableData = [
        'title' => [
            'type' => 'text',
            'validate' => 'required|min:3',


        ],
        'text' => [
            'type' => 'textarea',
            'validate' => 'required_if:type,text',

        ],

    ];
    //when type is text cast body to text


    public static $rules = [

        'type' => 'required|in:video,file,text',
        'time' => 'required|min:3|max:255',
        'body' => 'nullable',
        'file' => 'required_if:type,file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,text,txt',
        'video' => 'required_if:type,video|mimes:mp4,ogx,oga,ogv,ogg,webm,mov,qt,mkv',
        'course_id' => 'required|exists:courses,id',
    ];

    protected $fillable = [
        'title',
        'slug',
        'type',
        'time',
        'body',
        'course_id',
    ];
    protected $translatable = ['title', 'body'];


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->usingSeparator('-')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function getBodyAttribute($value)
    {
        if ($this->type == 'text') {
            return $value;
        }
        return $this->getRawOriginal('body');
    }

    //set body attribute
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value;
    }


}
