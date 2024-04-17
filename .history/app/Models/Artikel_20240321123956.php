<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table ='artikel';
    protected $fillable =['id','title','desc','isi','gambar','status','url', 'file_pdf', 'profil_id','kategori_id','created_at','updated_at'];

    public function Profil()
    {
    	return $this->belongsTo('RSunandSite\Models\Profil');
    }

    public function kategori()
    {
    	return $this->belongsTo('RSunandSite\Models\Kategori');
    }
}
