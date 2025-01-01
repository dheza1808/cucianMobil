<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('posisi')->nullable();
            $table->text('riwayat_kerja')->nullable();
            $table->string('foto_ktp')->nullable(); // Kolom untuk foto KTP
            $table->date('tanggal_masuk_kerja')->nullable(); // Kolom untuk tanggal masuk kerja
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
