<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen_kategori_nama',
        'dokumen_kategori_slug'
    ];

    public function dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }
}
