<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function spesialis() {
        return $this->belongsTo(spesialis::class, 'spesialis_id');
    }
}
