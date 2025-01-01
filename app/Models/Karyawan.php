<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawans";

    protected $fillable = [
        'nama',
        'email',
        'posisi',
        'riwayat_kerja',
        'foto_ktp', // Pastikan kolom ini ada
        'tanggal_masuk_kerja', // Pastikan kolom ini ada
    ];
}
