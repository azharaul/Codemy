<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'occupation',
        'role'
    ];

    public function courses()
    {
        // kalau role nya student, maka akan menghubungkan ke course_student
        // 1 user bisa mengikuti banyak kursus
        return $this->belongsToMany(Course::class, 'course_students');
    }

    public function teaching()
    {
        // kalau role nya teacher, maka akan menghubungkan ke course_teacher
        // 1 teacher bisa mengajar banyak kursus
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function transactions()
    {
        // 1 user bisa memiliki banyak transaksi
        return $this->hasMany(Transaction::class);
    }

    public function hasActiveCourse($course_id)
    {
        return $this->courses()->where('course_id', $course_id)->exists();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
