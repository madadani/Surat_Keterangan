<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHasilPemeriksaanToTextInSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE surat_keterangan MODIFY COLUMN hasil_pemeriksaan TEXT");
        \DB::statement("ALTER TABLE surat_keterangan MODIFY COLUMN keperluan TEXT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            //
        });
    }
}
