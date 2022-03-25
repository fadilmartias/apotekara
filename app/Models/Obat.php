<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'harga_satuan',
        'harga_strip',
        'stok',
    ];

    public function Penjualan(): BelongsToMany
    {
        return $this->belongsToMany(Penjualan::class, 'penjualan_obats', 'obat_id', 'penjualan_id');
    }
}
