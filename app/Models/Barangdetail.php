<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_minta',
        'id_barang',
        'jml_diminta',
        'jml_dipenuhi',
        'keterangan',
    ];
}
