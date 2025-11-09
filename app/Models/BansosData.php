<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BansosData extends Model
{
    protected $fillable = [
        'nama',
        'nomor_kartu_keluarga',
        'nomor_telepon',
        'alamat',
    ];
}
