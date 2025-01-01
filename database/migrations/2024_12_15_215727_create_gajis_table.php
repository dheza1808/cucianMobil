<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajisTable extends Migration
{
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->integer('jumlah_layanan');
            $table->decimal('harga_mobil', 10, 2);
            $table->decimal('pinjaman', 10, 2);
            $table->decimal('total_gaji', 10, 2);
            $table->integer('jumlah_karpet')->nullable();
            $table->decimal('harga_cuci_karpet', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gajis');
    }
}
