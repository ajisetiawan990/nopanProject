<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'tb_pengaduan';

    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'id_masyarakat',
        'isi_laporan',
        'status',
    ];
    //
     public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat', 'id');
    }
}
