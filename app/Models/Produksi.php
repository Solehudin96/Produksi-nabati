<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksis';

    protected $fillable = [
        'tanggal_produksi',
        'nama_produk',
        'customer',
        'target_planning',
        'hasil_produksi_actual',
    ];
}
