<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisMasuk extends Model
{
    use HasFactory;

    protected $table = 'servis_masuk';

    protected $fillable = [
        'kategori_servis',
        'nama_pelanggan',
        'nomor_hp',
        'nama_unit',
        'nomor_unit',
        'tanggal_masuk',
        'nama_teknisi',
        'keluhan',
        'status'
    ];

}
