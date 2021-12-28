<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkprdSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkprd_surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tkprd_kegiatan_id');
            $table->date('tkprd_survey_tanggal');
            $table->string('tkprd_survey_lokasi');
            $table->text('tkprd_survey_catatan')->nullable();
            $table->timestamps();

            $table->foreign('tkprd_kegiatan_id')->references('id')->on('tkprd_kegiatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tkprd_surveys');
    }
}