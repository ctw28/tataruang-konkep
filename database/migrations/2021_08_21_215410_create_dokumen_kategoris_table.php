<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('dokumen_kategori_nama',150);
            $table->string('dokumen_kategori_slug',150);
            $table->string('dokumen_kategori_keterangan',150)->nullable();
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
        Schema::dropIfExists('dokumen_kategoris');
    }
}
