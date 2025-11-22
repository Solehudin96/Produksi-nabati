<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapAbsensiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Absensi::with('karyawan')->get()->map(function ($abs) {
            return [
                'Nama Karyawan' => $abs->karyawan->nama ?? '-',
                'Tanggal'       => $abs->tanggal,
                'Status'        => $abs->status,
                'Jam Masuk'     => $abs->jam_masuk,
                'Jam Keluar'    => $abs->jam_keluar,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Karyawan',
            'Tanggal',
            'Status',
            'Jam Masuk',
            'Jam Keluar',
        ];
    }
}
