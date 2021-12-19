<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'survey_nama',
        'survey_lokasi',
        'survey_tanggal',
        'survey_catatan'
    ];

    public function surveyFile()
    {
        return $this->hasMany('App\Models\SurveyFile');
    }
}
