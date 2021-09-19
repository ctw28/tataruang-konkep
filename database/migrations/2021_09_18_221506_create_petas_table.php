<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peta_kategori_id');
            $table->string('peta_nama',150);
            $table->string('peta_slug',200);
            $table->string('peta_deskripsi',200);
            $table->string('folder_path',200);
            $table->timestamps();

            $table->foreign('peta_kategori_id')->references('id')->on('peta_kategoris');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petas');
    }
}
