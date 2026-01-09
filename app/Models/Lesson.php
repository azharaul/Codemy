<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

        'video_url',
        'course_id'
    ];

    public function course(){
        //1 materi harus dimiliki oleh 1 kursus
        return $this->belongsTo(Course::class);
    }

    public function getVideoIdAttribute()
{
    // Logic sederhana ambil ID Youtube dari URL
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->video_url, $match);
    return $match[1] ?? null;
}
// Jangan lupa tambahkan 'video_id' di $appends kalau pakai JSON, tapi buat blade ini cukup.
}
