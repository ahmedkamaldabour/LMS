<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }



}
