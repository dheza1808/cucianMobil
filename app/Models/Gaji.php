<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = "gaji";
    protected $fillable = [
        'nama_karyawan',
        'jumlah_layanan',
        'harga_mobil',
        'pinjaman',
        'jumlah_karpet',
        'harga_cuci_karpet',
        'total_gaji',
    ];
}
