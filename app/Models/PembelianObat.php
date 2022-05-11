<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_obat',
        'id_pembelian',
        'no_transaksi',
        'qty',
        'satuan',
        'harga'
    ];
}
