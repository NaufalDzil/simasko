<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nama_karyawan',
        'no_telepon',
        'alamat',
        'gaji',
        'foto',
        'umur',
        'jenis_kelamin',
    ];
}
