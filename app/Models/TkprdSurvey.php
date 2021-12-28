<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkprdSurvey extends Model
{
    use HasFactory;
    protected $fillable = [
        'tkprd_kegiatan_id',
        'tkprd_survey_tanggal',
        'tkprd_survey_lokasi',
        'tkprd_survey_catatan'
    ];

    public function tkprdKegiatan()
    {
        return $this->belongsTo('App\Models\TkprdKegiatan');
    }

    public function tkprdSurveyFile()
    {
        return $this->hasMany('App\Models\TkprdSurveyFile');
    }
}