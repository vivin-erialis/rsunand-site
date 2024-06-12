<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterSpesialis extends Model
{
    use HasFactory;

    protected $table = 'm_dokter_spesialis';

    protected $primaryKey = 'id_dokter_spesialis';

    protected $fillable = [
        'id_dokter_spesialis',
        'id_dokter',
        'id_spesialis',
        'idhfis',
        'statusenabled'
    ];
}
