<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    protected  $fillable = [
        'image',
        'name',
        'harga',
        'stok',
        'kategori',
    ];

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
