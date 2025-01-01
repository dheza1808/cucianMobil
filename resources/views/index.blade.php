@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-5">Daftar Mobil yang Masuk</h2>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah mobil -->
    <div class="text-end mb-3">
        <a href="{{ route('cars.create') }}" class="btn btn-success">Tambah Mobil</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Jenis Kendaraan</th>
                <th>Nomor Plat</th>
                <th>Jenis Layanan</th>
                <th>Status Pembayaran</th>
                <th>Waktu Layanan</th>
                <th>Nama Karyawan</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @if($cars->isEmpty())
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data mobil yang masuk.</td>
                </tr>
            @else
                @foreach($cars as $car)
                <tr>
                    <td>{{ ucfirst($car->vehicle_type) }}</td>
                    <td>{{ $car->car_plate }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $car->service_type)) }}</td>
                    <td>{{ ucfirst($car->payment_status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($car->service_time)->format('d-m-Y H:i') }}</td>
                    <td>{{ ucfirst($car->employee_name) }}</td>
                    <td>{{ ucfirst($car->remarks) }}</td>
                    <td>{{ 'Rp ' . number_format($car->car_price, 2, ',', '.') }}</td>
                    <td>

                        
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $cars->links() }} <!-- Untuk pagination -->
</div>
@endsection