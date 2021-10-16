<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasFactory;
    protected $fillable = [
        'peta_kategori_id',
        'peta_nama',
        'peta_slug',
        'peta_deskripsi',
        'peta_folder_path',
    ];

    public function petaKategori()
    {
        return $this->belongsTo('App\Models\PetaKategori');
    }
}
