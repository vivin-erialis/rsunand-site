<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direksi extends Model
{
    use HasFactory;

    protected $table = 'm_jabatan_det';

    protected $primaryKey = 'id_jabatan_det';

    protected $fillable = [
        'id_jabatan_det',
        'id_jabatan',
        'id_dokter',
        'periode_jabatan_awal',
        'periode_jabatan_akhir',
        'status'
    ];
}
