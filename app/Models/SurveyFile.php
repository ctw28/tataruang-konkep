<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'survey_file_lokasi'
    ];

    public function survey()
    {
        return $this->belongsTo('App\Models\Survey');
    }
}
