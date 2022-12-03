<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi',
        'total_transaksi',
        'user_id',
        'nama_penjual',
        
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
