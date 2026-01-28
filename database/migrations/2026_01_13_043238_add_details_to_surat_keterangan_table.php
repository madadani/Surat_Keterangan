<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            $table->string('pekerjaan')->nullable()->after('pendaftar_id');
            $table->string('tinggi_badan')->nullable()->after('pekerjaan');
            $table->string('berat_badan')->nullable()->after('tinggi_badan');
            $table->string('tensi')->nullable()->after('berat_badan');
            $table->string('nadi')->nullable()->after('tensi');
            $table->string('suhu')->nullable()->after('nadi');
            $table->string('respirasi')->nullable()->after('suhu');
            $table->string('buta_warna')->nullable()->after('respirasi');
            $table->string('keperluan')->nullable()->after('buta_warna');
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
            $table->dropColumn([
                'pekerjaan',
                'tinggi_badan',
                'berat_badan',
                'tensi',
                'nadi',
                'suhu',
                'respirasi',
                'buta_warna',
                'keperluan'
            ]);
        });
    }
}
