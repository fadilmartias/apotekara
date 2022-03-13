<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'qty',
        'satuan',
        'harga',
        'no_transaksi',
        'total_harga',
        'nama_user',
    ];
}
