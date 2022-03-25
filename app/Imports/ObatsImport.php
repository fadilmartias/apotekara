<?php

namespace App\Imports;

use Throwable;
use App\Models\Obat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ObatsImport implements ToModel, WithHeadingRow, SkipsOnError, WithChunkReading, ShouldQueue, WithBatchInserts, WithProgressBar
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Obat([
            'nama_obat'     => $row['nama_obat'],
            'harga_satuan'    => $row['harga_satuan'],
            'harga_strip' => $row['harga_strip'],
            'stok' => $row['stok'],

        ]);
    }

    public function onError(Throwable $error)
    {

    }

    public function batchSize(): int
    {
        return 10000;
    }

    public function chunkSize(): int
    {
        return 10000;
    }
}
