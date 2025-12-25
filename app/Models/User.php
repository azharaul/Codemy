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

    public function courses(){//kalau role nya student, maka akan menghubungkan ke course_student
        return $this->belongsToMany(Course::class, 'course_students');//course_students adalah nama tabel transaksi
        //1 user bisa mengikuti banyak kursus
    }
    
    public function teaching(){//kalau role nya teacher, maka akan menghubungkan ke course_teacher
        return $this->hasMany(Course::class, 'teacher_id');
        //1 teacher bisa mengajar banyak kursus
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
        //1 user bisa memiliki banyak transaksi
    }

    public function berlangganan(){
        //mencari transaksi terakhir yang sudah dibayar
        $transaksiTerakhir = $this->transactions()->where('is_paid', true)->latest()->first();
        
        //jika tidak ada transaksi terakhir yang sudah dibayar
        if(!$transaksiTerakhir){
            return false;
        }

        $tanggalBerlanggananBerakhir = \Carbon\Carbon::parse($transaksiTerakhir->subscription_start_date)->addMonths();

        return \Carbon\Carbon::now()->lessThan($tanggalBerlanggananBerakhir);
        //mengembalikan true jika tanggal berlangganan belum berakhir
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
