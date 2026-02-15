<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tb_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'id_user',
        'tgl_tanggapan',
        'tanggapan',
    ];
    
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
