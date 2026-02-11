<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdentitasPemeriksaToSuratKeterangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            $table->string('identitas_pemeriksa')->default('NIP')->after('dokter_id');
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
            $table->dropColumn('identitas_pemeriksa');
        });
    }
}
