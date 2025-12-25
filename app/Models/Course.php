<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'about',        
        'thumbnail',        
        'teacher_id',        
        'category_id'        
    ];

    public function category(){
        //1 kursus harus dimiliki oleh 1 kategori
        return $this->belongsTo(Category::class);
    }

    public function teacher(){
        //1 kursus harus dimiliki oleh 1 teacher
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function lessons(){
        //1 kursus dapat memiliki banyak materi
        return $this->hasMany(Lesson::class);
    }

    public function students(){
        //1 kursus dapat memiliki banyak student
        return $this->belongsToMany(User::class, 'course_students');
    }
}
