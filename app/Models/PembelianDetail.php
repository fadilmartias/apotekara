<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi',
        'obat_id',
        'qty',
        'diskon',
        'harga',
        'total_harga',
    ];

    public function Obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function Pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'no_transaksi', 'no_transaksi');
    }
}
