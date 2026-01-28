<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            $table->string('pendidikan')->nullable()->after('pekerjaan');
            $table->date('pada_tanggal')->nullable()->after('pendidikan');

            // Kolom Hasil Narkoba
            $table->string('morphine')->default('Negatif')->after('hasil_pemeriksaan');
            $table->string('canabinoid')->default('Negatif')->after('morphine');
            $table->string('amphetamine')->default('Negatif')->after('canabinoid');
            $table->string('benzodiazepine')->default('Negatif')->after('amphetamine');
            $table->string('metamfetamin')->default('Negatif')->after('benzodiazepine');
            $table->string('cocaine')->default('Negatif')->after('metamfetamin');

            $table->text('saran')->nullable()->after('cocaine');
            $table->text('kesimpulan')->nullable()->after('saran');
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
