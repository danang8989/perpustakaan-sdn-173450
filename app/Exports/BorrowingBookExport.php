<?php

namespace App\Exports;

use App\Models\BorrowingBook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\{WithMapping, WithStyles, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BorrowingBookExport implements FromCollection, WithHeadings, WithMapping, withStyles
{

    private $date_from, $until_date;

    public function ___construct($date_from, $until_date){
        $this->date_from = $date_from;
        $this->until_date = $until_date;
    }

    public function headings(): array
    {
        return ['id', 'Nama Peminjam', 'Tanggal Pinjam', 'Tanggal Kembali'];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    { 
        return BorrowingBook::whereDate('date_from', '>=', date('Y-m-d', strtotime($this->date_from)))->get();
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
            $row->member->name,
            \Carbon\Carbon::parse($row->date_from)->format('d-m-Y'),
            \Carbon\Carbon::parse($row->date_to)->format('d-m-Y'),
        ];
    }
}
