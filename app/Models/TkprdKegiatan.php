<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkprdKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tkprd_kegiatan',
        'tkprd_kegiatan_slug',
        'tkprd_kegiatan_investor',
        'tkprd_kegiatan_surat',
        // 'tkprd_kegiatan_tanggal',
        'tkprd_kegiatan_catatan',
    ];

    public function tkprdSurvey()
    {
        return $this->hasMany('App\Models\TkprdSurvey');
    }
}