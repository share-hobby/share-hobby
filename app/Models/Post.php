<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  
        'title',   
        'body',     
        'image',   
        'zoomurl', 
        'student_image',
        'student_level'
    ];

    // ユーザーとのリレーション（投稿は1人のユーザーに属する）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}