<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'tb_petugas';

    protected $fillable = [
        'id_petugas',
        'id_user',
        'jabatan',
        'telepon',
    ];
    //
}
