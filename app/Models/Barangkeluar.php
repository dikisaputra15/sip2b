<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_barang_keluar',
        'nama_petugas',
    ];
}
