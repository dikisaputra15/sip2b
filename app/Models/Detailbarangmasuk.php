<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbarangmasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang_masuk',
        'id_barang',
        'jml_barang_masuk',
    ];
}
