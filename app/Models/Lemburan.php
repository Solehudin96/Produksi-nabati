<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lemburan extends Model
{
    protected $table = 'lemburan';

    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
