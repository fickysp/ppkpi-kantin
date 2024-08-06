<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'users_id',
        'amount',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
