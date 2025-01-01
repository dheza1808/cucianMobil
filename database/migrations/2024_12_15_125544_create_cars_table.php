<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type')->nullable(); // Menambahkan kolom jenis kendaraan
            $table->string('car_plate'); // Nomor plat
            $table->string('service_type'); // Jenis layanan
            $table->string('payment_status'); // Status pembayaran
            $table->dateTime('service_time'); // Waktu layanan
            $table->string('employee_name'); // Nama karyawan
            $table->string('remarks'); // Keterangan
            $table->decimal('car_price', 10, 2); // Harga mobil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
