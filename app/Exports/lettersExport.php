<?php

namespace App\Exports;

use App\Models\letters;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class lettersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return letters::get();
    }
    public function headings(): array
    {
        return [
            "Nomor Surat", "Perihal", "Tanggal Keluar", "ID Penerima Surat", "ID Notulis"
        ];
    }
    public function map($item): array
    {
        return [
            $item->id,
            $item->letter_perihal,
            $item->created_at,
            $item->recipients,
            $item->notulis_id,
        ];
    }
}
