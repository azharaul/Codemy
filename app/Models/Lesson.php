<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'video_url',
        'course_id'
    ];

    public function course(){
        //1 materi harus dimiliki oleh 1 kursus
        return $this->belongsTo(Course::class);
    }
}
