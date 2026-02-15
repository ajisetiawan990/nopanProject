<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'tb_pengaduan';

    // ✅ WAJIB TAMBAH INI
    protected $primaryKey = 'id_pengaduan';

    public $incrementing = true;   // kalau auto increment
    protected $keyType = 'int';    // kalau tipe int

    protected $fillable = [
        'tgl_pengaduan',
        'id_masyarakat',
        'isi_laporan',
        'status',
        'id_user',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat', 'id');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
