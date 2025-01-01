@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Pengelolaan Gaji Karyawan</h1>
    <p class="text-center">Menghitung gaji karyawan berdasarkan jumlah layanan yang dikerjakan, termasuk tambahan mencuci karpet.</p>

    <div class="text-end mb-3">
        <a href="{{ route('gaji.create') }}" class="btn btn-success">Tambah Gaji Karyawan</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Jumlah Layanan</th>
                    <th>Harga Mobil</th>
                    <th>Pinjaman</th>
                    <th>Jumlah Karpet Dicuci</th>
                    <th>Harga Cuci Karpet</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gajis as $gaji)
                <tr>
                    <td>{{ $gaji->nama_karyawan }}</td>
                    <td>{{ $gaji->jumlah_layanan }}</td>
                    <td>{{ number_format($gaji->harga_mobil, 2) }}</td>
                    <td>{{ number_format($gaji->pinjaman, 2) }}</td>
                    <td>{{ $gaji->jumlah_karpet }}</td>
                    <td>{{ number_format($gaji->harga_cuci_karpet, 2) }}</td>
                    <td>{{ number_format($gaji->total_gaji, 2) }}</td>
                    <td>

                        
                    <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data gaji karyawan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection