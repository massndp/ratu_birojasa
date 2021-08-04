<?php

namespace App\Exports;

use App\Motor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class MotorExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Motor::select(
            'number', 'layanan', 'nama_pemilik', 'no_polisi', 'no_rangka', 'no_mesin', 'nama_stnk', 'dp', 'tanggal_terima', 'estimasi', 'keterangan', 'status'
        )->get();
    }

    public function headings(): array {
        return [
            "number", "Layanan", "Nama Pemilik", "Nopol", "No Rangka", "No Mesin", "Nama STNK", "DP", "Estimasi", "Tanggal Terima", "Keterangan", "Status" 
        ];
    }
}
