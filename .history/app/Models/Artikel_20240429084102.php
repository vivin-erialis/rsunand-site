<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'desc', 'isi', 'gambar', 'status', 'url', 'profil_id', 'kategori_id', 'created_at', 'updated_at'];


    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id');
    }
}
