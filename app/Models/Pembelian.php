<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_harga',
        'obat_id',
        'user_id',
        'qty',
        'satuan',
        'nama_penjual',
        'harga_satuan'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
