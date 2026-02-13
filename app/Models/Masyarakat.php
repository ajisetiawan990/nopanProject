<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'tb_masyarakat';

    protected $fillable = [
        'id',
        'nik',
        'id_user',
        'tanggal_lahir',
        'telp',
    ];
    //
     public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_masyarakat', 'id');
    }
}
