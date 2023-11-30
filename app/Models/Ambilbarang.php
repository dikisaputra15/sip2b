<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambilbarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_ambil',
        'nama_kagudang',
        'keperluan_proyek',
        'lokasi_proyek',
        'nama_pengambil',
        'keterangan',
    ];
}
