<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'jenis',
        'keterangan',
        'file_bukti',
        'status',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
