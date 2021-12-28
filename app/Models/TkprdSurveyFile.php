<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkprdSurveyFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'tkprd_survey_id',
        'tkprd_survey_file_kategori_id',
        'tkprd_survey_file_path'
    ];

    public function tkprdSurvey()
    {
        return $this->belongsTo('App\Models\tkprdSurvey');
    }
    public function tkprdSurveyFileKategori()
    {
        return $this->belongsTo('App\Models\TkprdSurveyFileKategori');
    }
}