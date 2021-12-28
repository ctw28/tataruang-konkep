<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TkprdSurveyFileKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_file_kategori',
        'survey_file_allowed_type',
        'survey_file_keterangan'
    ];

    public function tkprdSurveyFile()
    {
        return $this->hasMany('App\Models\TkprdSurveyFile');
    }
}