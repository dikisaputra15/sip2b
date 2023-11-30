<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailambil extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ambil_barang',
        'id_barang',
        'jml_barang',
    ];
}
