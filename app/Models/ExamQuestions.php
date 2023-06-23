<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestions extends Model
{
    use HasFactory;

    const PATH_IMAGE = 'uploads/examQuestions/images/';

    protected $fillable = ["exam_id", "question", "question_image", "active"];


    public function exam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}
