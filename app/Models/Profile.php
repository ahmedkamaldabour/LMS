<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    const PATH = "images/profileImages";

    protected $fillable = ['phone', 'image', 'admin_id'];

    public function getImageAttribute($image)
    {
        return asset('assetsAdmin') . DIRECTORY_SEPARATOR . $image;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
