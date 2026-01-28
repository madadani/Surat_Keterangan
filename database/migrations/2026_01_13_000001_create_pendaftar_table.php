<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('no_registrasi')->unique();
            $blueprint->string('nama_lengkap');
            $blueprint->string('tempat_lahir');
            $blueprint->date('tanggal_lahir');
            $blueprint->string('jenis_kelamin');
            $blueprint->text('alamat');
            $blueprint->string('no_hp')->nullable();
            $blueprint->string('keperluan');
            $blueprint->string('jenis_test'); // Bisa JSON jika multiple, tapi string cukup untuk sekarang
            $blueprint->enum('status', ['Pending', 'Verified', 'Selesai'])->default('Pending');
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
        Schema::dropIfExists('pendaftar');
    }
}
