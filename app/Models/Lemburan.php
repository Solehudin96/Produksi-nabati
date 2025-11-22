<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lemburan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'status_approve',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
