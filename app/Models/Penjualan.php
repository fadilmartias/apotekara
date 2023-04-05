<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi',
        'total_transaksi',
        'user_id',
        'ongkir',
        'nama_pembeli',
    ];

    /**
     * Get the user that owns the Penjualan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Details()
    {
        return $this->hasMany(PenjualanDetail::class, 'no_transaksi', 'no_transaksi');
    }

}
