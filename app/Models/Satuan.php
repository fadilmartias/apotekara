<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Satuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'obat_id',
        'nama_satuan'
    ];

    /**
     * Get the Obat that owns the Satuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }

}
