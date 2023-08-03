<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mintabarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'keperluan_proyek',
        'lokasi_proyek',
        'kode',
        'nama_kagudang',
    ];
}
