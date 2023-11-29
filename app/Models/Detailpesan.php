<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pesan_barang',
        'id_barang',
        'jml_barang',
    ];
}
