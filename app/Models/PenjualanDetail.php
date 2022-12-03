<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi',
        'obat_id',
        'qty',
        'harga',
        'total_harga'
    ];

    public function Obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function Penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'no_transaksi', 'no_transaksi');
    }
}
