<?php

namespace App\Exports;

use App\Models\letterTypes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class letterTypesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return letterTypes::with('letters')->get();
    }
    public function headings(): array
    {
        return [
            "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }
    public function map($item): array
    {
        return [
            $item->letter_code,
            $item->name_type,
            $item->letters->count(),
        ];
    }
}
