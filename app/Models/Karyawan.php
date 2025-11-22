<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'jabatan',
        'departemen',
        'jenis_kelamin',
        'no_telp',
        'alamat',
        'tanggal_masuk',
        'status'
    ];
        public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

}
