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
        'total_harga',
        'no_penjualan',
        'user_id',
        'qty',
        'satuan',
        'harga',
    ];

    /**
     * Get the user that owns the Penjualan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The Obat that belong to the Penjualan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Obat(): BelongsToMany
    {
        return $this->belongsToMany(Obat::class, 'penjualan_obats', 'penjualan_id', 'obat_id');
    }

}
