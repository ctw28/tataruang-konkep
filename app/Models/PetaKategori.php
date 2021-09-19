<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'peta_kategori_nama',
        'peta_kategori_deskipsi'
    ];

    // public function dokumen()
    // {
    //     return $this->hasMany('App\Models\Dokumen');
    // }
}
