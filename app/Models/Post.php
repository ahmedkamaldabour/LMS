<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations, HasSlug;

    const PATH = 'images/posts';
    protected $fillable = [
        'title',
        'body',
        'image',
        'like',
        'view_count',
        'admin_id',
        'category_id'
    ];
    protected $translatable = [
        'title',
        'body'
    ];

    public static $translatableData = [
        'title' => [
            'type' => 'text',
            'validate' => 'required|min:3'
        ],
        'body' => [
            'type' => 'textarea',
            'validate' => 'required|min:3'
        ]
    ];

    public static $rule = [
        'image'=>'nullable|image|mimes:png,jpg,jpeg,webp',
        'like'=>'nullable',
        'category_id'=>'required|exists:blog_categories,id'
    ];
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

    // post belongs to category
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    // post has many comments
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    // pos has many views
    public function views()
    {
        return $this->hasMany(PostView::class);
    }



}
