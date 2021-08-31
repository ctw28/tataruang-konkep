<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokumen_kategori_id');
            $table->unsignedBigInteger('user_id');
            $table->string('dokumen_nama',150);
            $table->string('dokumen_slug',200);
            $table->string('dokumen_lokasi_file',200);
            $table->string('dokumen_keterangan',500);
            // $table->date('dokumen_tanggal');
            $table->timestamps();

            $table->foreign('dokumen_kategori_id')->references('id')->on('dokumen_kategoris');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumens');
    }
}
