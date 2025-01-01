<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class GajiController extends Controller
{
    // Menampilkan daftar gaji
    public function index()
    {
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $gajis = Gaji::all();
        return view('gaji', compact('gajis'));
    }

    // Menampilkan formulir untuk membuat gaji baru
    public function create()
    {
        // Ambil data karyawan dari database
        $karyawans = Karyawan::all(['id', 'nama']); // Ganti 'id' dan 'nama' sesuai dengan kolom pada tabel Anda
    
        // Kirim data ke view
        return view('gajiCreate', compact('karyawans'));
    }
    

    // Menyimpan data gaji baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_karyawan' => 'required',
            'jumlah_layanan' => 'required',
            'harga_mobil' => 'required',
            'pinjaman' => 'nullable',
            'jumlah_karpet' => 'nullable',
            'harga_cuci_karpet' => 'nullable',
        ]);
    
        // Parsing nilai ke numerik
        $jumlah_layanan = floatval($request->jumlah_layanan);
        $harga_mobil = floatval($request->harga_mobil);
        $pinjaman = floatval($request->pinjaman ?? 0);
        $jumlah_karpet = floatval($request->jumlah_karpet ?? 0);
        $harga_cuci_karpet = $request->cuci_karpet === 'tidak' ? 0 : floatval($request->harga_cuci_karpet ?? 0);
    
        // Perhitungan total gaji
        $gaji_per_mobil = $harga_mobil * 0.35;
        $total_gaji = $gaji_per_mobil * $jumlah_layanan;
    
        if ($jumlah_karpet > 0 && $harga_cuci_karpet > 0) {
            $total_gaji += $jumlah_karpet * $harga_cuci_karpet;
        }
    
        if ($pinjaman > 0) {
            $total_gaji -= $pinjaman;
        }
    
        // Menyimpan data gaji
        Gaji::create([
            'nama_karyawan' => $request->nama_karyawan,
            'jumlah_layanan' => $jumlah_layanan,
            'harga_mobil' => $harga_mobil,
            'pinjaman' => $pinjaman,
            'jumlah_karpet' => $jumlah_karpet,
            'harga_cuci_karpet' => $harga_cuci_karpet,
            'total_gaji' => $total_gaji,
        ]);
    
        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil disimpan.');
    }
    

    // Menampilkan formulir untuk mengedit data gaji
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        return view('gajiEdit', compact('gaji')); // Sesuaikan dengan nama view Anda
    }

    // Menyimpan perubahan data gaji yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jumlah_layanan' => 'required|integer|min:0',
            'harga_mobil' => 'required|numeric|min:0',
            'pinjaman' => 'nullable|numeric|min:0',
            'jumlah_karpet' => 'nullable|integer|min:0',
            'harga_cuci_karpet' => 'nullable|numeric|min:0',
        ]);

        // Perhitungan total gaji
        $gaji_per_mobil = $request->harga_mobil * 0.35;
        $total_gaji = $gaji_per_mobil * $request->jumlah_layanan;

        if ($request->jumlah_karpet && $request->harga_cuci_karpet) {
            $total_gaji += $request->jumlah_karpet * $request->harga_cuci_karpet;
        }

        if ($request->pinjaman) {
            $total_gaji -= $request->pinjaman;
        }

        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'nama_karyawan' => $request->nama_karyawan,
            'jumlah_layanan' => $request->jumlah_layanan,
            'harga_mobil' => $request->harga_mobil,
            'pinjaman' => $request->pinjaman ?? 0,
            'jumlah_karpet' => $request->jumlah_karpet ?? 0,
            'harga_cuci_karpet' => $request->harga_cuci_karpet ?? 0,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil diupdate.');
    }

    // Menghapus data gaji
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil dihapus.');
    }
}
