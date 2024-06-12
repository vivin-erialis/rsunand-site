<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaSama extends Model
{
    use HasFactory;


    protected $table = 'kerjasama';
    protected $primaryKey = 'id_kerjasama';

    protected $guarded = [];
}
