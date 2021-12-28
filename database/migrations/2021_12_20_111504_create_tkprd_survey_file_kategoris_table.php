<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkprdSurveyFileKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkprd_survey_file_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('survey_file_kategori');
            $table->string('survey_file_allowed_type');
            $table->string('survey_file_keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tkprd_survey_file_kategoris');
    }
}