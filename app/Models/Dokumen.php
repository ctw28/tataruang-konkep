<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen_kategori_id',
        'user_id',
        'dokumen_nama',
        'dokumen_slug',
        'dokumen_lokasi_file',
        'dokumen_keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function dokumenKategori()
    {
        return $this->belongsTo('App\Models\DokumenKategori');
    }
}
