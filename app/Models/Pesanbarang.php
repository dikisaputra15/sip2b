<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanbarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pesan',
        'id_supplier',
        'nama_pemesan',
        'email_pemesan',
        'alamat_pemesan',
        'keterangan',
    ];
}
