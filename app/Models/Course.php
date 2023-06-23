<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    const PATH_IMAGE = 'uploads/courses/images/';
    const PATH_VIDEO = 'uploads/courses/videos/';

    protected $with = ['category:id,name,slug'];


    protected $fillable = [
        'title',
        'slug',
        'image',
        'intro',
        'description',
        'requirements',
        'price',
        'category_id'
    ];

    protected $translatable = [
        'title',
        'description',
        'requirements'
    ];

    public static $translatableData = [
        'title' => [
            'type' => 'text',
            'validate' => 'required|string|min:3'
        ],
        'description' => [
            'type' => 'textarea',
            'validate' => 'required|string|min:3'
        ],
        'requirements' => [
            'type' => 'textarea',
            'validate' => 'required|string|min:3'
        ],
    ];





    public static function rules()
    {
        return [
            'price' => 'required|numeric|min:0|max:999999.99',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->usingSeparator('-')
            ->saveSlugsTo('slug');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }


}
