<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tb_tanggapan';

    protected $fillable = [
        'id',
        'id_pengaduan',
        'id_petugas',
        'tgl_tanggapan',
        'tanggapan',
    ];
    //
}
