<?php

// app/Models/Car.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";
    protected $fillable = [
        'vehicle_type', // Kolom jenis kendaraan
        'car_plate',
        'service_type',
        'payment_status',
        'service_time',
        'employee_name',
        'remarks',
        'car_price', // Kolom harga
    ];
}
