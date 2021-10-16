<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'peta_kategori_nama',
        'peta_kategori_slug',
        'peta_kategori_deskripsi'
    ];

    public function peta()
    {
        return $this->hasMany('App\Models\Peta');
    }
}
