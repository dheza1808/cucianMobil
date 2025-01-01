<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    public function index()
    {
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $karyawans = Karyawan::all();
        return view('dataKaryawan', compact('karyawans'));
    }

    public function create()
    {
        return view('createKaryawan'); // Buat view untuk form tambah karyawan
    }

    public function store(Request $request)
    {
        // Debugging: Melihat semua input yang diterima
       
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:karyawans',
            'posisi' => 'required|string|max:255',
            'riwayat_kerja' => 'nullable|string',
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi file
            'tanggal_masuk_kerja' => 'required|date',
        ]);
    
        // Proses upload file foto_ktp
        $fotoKtpPath = null;
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
    
            // Nama unik untuk file
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Pindahkan file ke folder public/assets/foto_ktp
            $file->move(public_path('assets/foto_ktp'), $fileName);
    
            // Simpan path file untuk disimpan ke database
            $fotoKtpPath = 'assets/foto_ktp/' . $fileName;
        }
        // dd($request->all());
    
        // Menyimpan data ke database
        Karyawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'posisi' => $request->posisi,
            'riwayat_kerja' => $request->riwayat_kerja,
            'foto_ktp' => $fotoKtpPath, // Path file yang diunggah
            'tanggal_masuk_kerja' => $request->tanggal_masuk_kerja,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('dataKaryawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('editKaryawan', compact('karyawan')); // Buat view untuk form edit karyawan
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:karyawans,email,' . $id,
            'posisi' => 'required|string|max:255',
            'riwayat_kerja' => 'nullable|string',
            'tanggal_masuk_kerja' => 'required|date',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return redirect()->route('dataKaryawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('dataKaryawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
