<!-- resources/views/dataKaryawan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Pengelolaan Data Karyawan</h1>
    <p class="text-center">Menyimpan informasi karyawan, termasuk data pribadi dan riwayat kerja, agar mudah diakses untuk keperluan administrasi.</p>

    <div class="text-end mb-3">
        <a href="{{ route('dataKaryawan.create') }}" class="btn btn-success">Tambah Karyawan</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Email Karyawan</th>
                    <th>Posisi</th> <!-- Menambahkan kolom untuk posisi -->
                    <th>Riwayat Kerja</th> <!-- Menambahkan kolom untuk riwayat kerja -->
                    <th>Foto KTP</th>
                    <th>Tanggal Masuk Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($karyawans->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data karyawan.</td>
                </tr>
                @else
                @foreach($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->email }}</td>
                    <td>{{ $karyawan->posisi }}</td> <!-- Menampilkan posisi -->
                    <td>{{ $karyawan->riwayat_kerja }}</td> <!-- Menampilkan riwayat kerja -->
                    <td>
                        @if($karyawan->foto_ktp)
                        <img src="{{ asset($karyawan->foto_ktp) }}" alt="Foto KTP" style="width: 100px; height: auto;">
                        @else
                        Tidak ada foto
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($karyawan->tanggal_masuk_kerja)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('dataKaryawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dataKaryawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
