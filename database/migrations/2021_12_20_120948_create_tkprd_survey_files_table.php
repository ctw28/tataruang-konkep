<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkprdSurveyFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkprd_survey_files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tkprd_survey_id');
            $table->unsignedBigInteger('tkprd_survey_file_kategori_id');
            $table->string('tkprd_survey_file_path');
            $table->timestamps();

            $table->foreign('tkprd_survey_id')->references('id')->on('tkprd_surveys')->onDelete('cascade');
            $table->foreign('tkprd_survey_file_kategori_id')->references('id')->on('tkprd_survey_file_kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tkprd_survey_files');
    }
}