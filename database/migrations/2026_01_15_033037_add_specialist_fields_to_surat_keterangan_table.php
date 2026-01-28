<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpecialistFieldsToSuratKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_keterangan', function (Blueprint $table) {
            $table->string('visus_kanan')->nullable()->after('kesimpulan');
            $table->string('visus_kiri')->nullable()->after('visus_kanan');
            $table->string('segmen_anterior')->nullable()->after('visus_kiri');
            $table->string('golongan_darah')->nullable()->after('segmen_anterior');
            $table->string('tes_bisik')->nullable()->after('golongan_darah');
            $table->string('telinga_kiri')->nullable()->after('tes_bisik');
            $table->string('telinga_kanan')->nullable()->after('telinga_kiri');
            $table->string('hidung')->nullable()->after('telinga_kanan');
            $table->string('tenggorokan')->nullable()->after('hidung');
            $table->text('tindakan_gigi')->nullable()->after('tenggorokan');
            $table->date('kontrol_ulang')->nullable()->after('tindakan_gigi');
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
                'visus_kanan',
                'visus_kiri',
                'segmen_anterior',
                'golongan_darah',
                'tes_bisik',
                'telinga_kiri',
                'telinga_kanan',
                'hidung',
                'tenggorokan',
                'tindakan_gigi',
                'kontrol_ulang'
            ]);
        });
    }
}
