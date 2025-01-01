<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        
        $cars = DB::table('cars')
            ->selectRaw('DATE(service_time) as tanggal, SUM(car_price) as pendapatan')
            ->where('payment_status', 'lunas')
            ->groupByRaw('DATE(service_time)');
    
        $gajis = DB::table('gaji')
            ->selectRaw('DATE(created_at) as tanggal, SUM(total_gaji) as pengeluaran')
            ->groupByRaw('DATE(created_at)');
    

        $laporans = DB::query()
            ->fromSub($cars, 'pemasukan')
            ->leftJoinSub($gajis, 'pengeluaran', 'pemasukan.tanggal', '=', 'pengeluaran.tanggal')
            ->selectRaw('
                COALESCE(pemasukan.tanggal, pengeluaran.tanggal) as tanggal,
                COALESCE(pemasukan.pendapatan, 0) as pendapatan,
                COALESCE(pengeluaran.pengeluaran, 0) as pengeluaran
            ')
            ->union(
                DB::query()
                    ->fromSub($gajis, 'pengeluaran')
                    ->leftJoinSub($cars, 'pemasukan', 'pengeluaran.tanggal', '=', 'pemasukan.tanggal')
                    ->selectRaw('
                        COALESCE(pemasukan.tanggal, pengeluaran.tanggal) as tanggal,
                        COALESCE(pemasukan.pendapatan, 0) as pendapatan,
                        COALESCE(pengeluaran.pengeluaran, 0) as pengeluaran
                    ')
            )
            ->orderBy('tanggal')
            ->get();

        foreach ($laporans as $laporan) {
   
            $laporan->detail_pemasukan = DB::table('cars')
                ->whereDate('service_time', $laporan->tanggal)
                ->where('payment_status', 'lunas')
                ->select('vehicle_type', 'car_plate', 'employee_name', 'car_price')
                ->get();
    
       
            $laporan->detail_pengeluaran = DB::table('gaji')
                ->whereDate('created_at', $laporan->tanggal)
                ->select('nama_karyawan', 'total_gaji')
                ->get();
        }
    
      
        $totalPendapatan = $laporans->sum('pendapatan');
        $totalPengeluaran = $laporans->sum('pengeluaran');
        $totalSaldo = $totalPendapatan - $totalPengeluaran;
  
        return view('laporan', compact('laporans', 'totalPendapatan', 'totalPengeluaran', 'totalSaldo'));
    }
    


    public function store(Request $request)
    {
        $laporan = new Laporan();
        $laporan->tanggal = $request->input('tanggal');
        $laporan->pendapatan = $request->input('pendapatan');
        $laporan->pengeluaran = $request->input('pengeluaran');
        $laporan->save();
        return redirect()->route('laporan.index');
    }
}