<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbarangkeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang_keluar',
        'id_barang',
        'jml_barang_keluar',
    ];
}
