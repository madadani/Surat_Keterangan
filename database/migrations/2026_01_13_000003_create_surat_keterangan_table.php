<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('pendaftar_id')->constrained('pendaftar')->onDelete('cascade');
            $blueprint->string('nomor_surat');
            $blueprint->string('hasil_pemeriksaan'); // Sehat / Tidak Sehat
            $blueprint->foreignId('dokter_id')->constrained('dokters')->onDelete('restrict');
            $blueprint->date('tanggal_cetak');
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keterangan');
    }
}
