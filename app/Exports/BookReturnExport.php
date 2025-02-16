<?php

namespace App\Exports;

use App\Models\BookReturn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\{WithMapping, WithStyles, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class BookReturnExport implements FromCollection
{
    private $date_from, $until_date;

    public function ___construct($date_from, $until_date){
        $this->date_from = $date_from;
        $this->until_date = $until_date;
    }

    public function headings(): array
    {
        return ['id', 'Nama Peminjam', 'Tanggal Pinjam Dari', 'Tanggal Kembali Sampai', 'Tanggal Pengembalian', 'Denda'];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { 
        // 01 - 02 - 2025 < 03 - 02 - 2025
        return BookReturn::whereBetween('updated_at', [Carbon::parse($this->date_from)->startOfDay()->format('Y-m-d H:i:s'),
                                                       Carbon::parse($this->until_date)->endOfDay()->format('Y-m-d H:i:s')])->get();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], // Warna teks putih
                  'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4CAF50']]], // Warna hijau
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->borrowing_book->member->name,
            \Carbon\Carbon::parse($row->borrowing_book->date_from)->format('d-m-Y'),
            \Carbon\Carbon::parse($row->borrowing_book->until_date)->format('d-m-Y'),
            \Carbon\Carbon::parse($row->borrowing_book->updated_at)->format('d-m-Y'),
            format_number($row->fine_total),

        ];
    }
}
