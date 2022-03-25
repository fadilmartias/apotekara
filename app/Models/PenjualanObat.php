<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PenjualanObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'obat_id',
        'no_penjualan',
        'qty',
        'satuan',
        'harga',
    ];

    /**
     * The roles that belong to the PenjualanObat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Obat(): BelongsToMany
    {
        return $this->belongsToMany(Obat::class, 'penjualan_obats', 'id', 'obat_id');
    }

    /**
     * Get the user that owns the PenjualanObat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_obats', 'no_penjualan');
    }

}
