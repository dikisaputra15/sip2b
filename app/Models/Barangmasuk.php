<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_barang_masuk',
        'nama_penerima',
    ];
}
