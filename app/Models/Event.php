<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['tanggal_awal', 'tanggal_akhir', 'jam_awal', 'jam_akhir'];

}
