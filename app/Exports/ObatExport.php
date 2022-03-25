<?php

namespace App\Exports;

use App\Models\Obat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ObatExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithEvents, ShouldQueue

{
    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Nama_Obat',
            'Harga_Satuan',
            'Harga_Strip',
            'Stok',
        ];
    }

    public function query()
    {
        return Obat::query();
    }

    public function map($obat): array
    {
        return [
            $obat->id,
            $obat->nama_obat,
            $obat->harga_satuan,
            $obat->harga_strip,
            $obat->stok,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }

}
