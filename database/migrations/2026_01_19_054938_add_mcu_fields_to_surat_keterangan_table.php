<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMcuFieldsToSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            $table->string('perusahaan')->nullable();
            $table->string('no_lab')->nullable();
            $table->json('mcu_data')->nullable(); // Using json to store the bulk of MCU fields
        });
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
