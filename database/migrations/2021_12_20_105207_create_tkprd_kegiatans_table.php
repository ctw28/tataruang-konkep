<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkprdKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkprd_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('tkprd_kegiatan');
            $table->string('tkprd_kegiatan_slug');
            $table->string('tkprd_kegiatan_investor');
            $table->string('tkprd_kegiatan_surat');
            // $table->date('tkprd_kegiatan_tanggal');
            $table->text('tkprd_kegiatan_catatan')->nullable();
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
        Schema::dropIfExists('tkprd_kegiatans');
    }
}