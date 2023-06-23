<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Exam extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable =
        [
            'name',
            'slug',
            'start',
            'end',
            'time',
            'degree',
            'exam_type',
            'active',
            'close',
            'limit_questions',
            'auto_answer',
            'admin_id'
        ];


    public static function rules(){
        return[
            'start' => 'required|date|after:now',
            'end' => 'required|date|after:start',
            'time' => 'required|string|min:1',
            'degree' => 'required|integer|min:1',
            'exam_type' => 'required|in:True&False,Choices,Asiyes',
            'active' => 'required|boolean',
            'close' => 'required|boolean',
            'limit_questions' => 'required|integer|min:1',
            'auto_answer' => 'required|boolean',
        ];
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class);

    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingSeparator('-')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestions::class);
    }

    public function examQuestions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamQuestions::class);
    }
}
