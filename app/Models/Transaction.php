<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    // Memberitahu Laravel bahwa tabel kita namanya 'subscribe_transactions'
    // (Bukan 'transactions')
    protected $table = 'subscribe_transactions';

    protected $fillable = [
        'total_amount',
        'is_paid',
        'proof',
        'subscription_start_date',
        'user_id'
    ];

    public function user(){
        // 1 transaksi harus dimiliki oleh 1 user
        return $this->belongsTo(User::class);
    }
}
