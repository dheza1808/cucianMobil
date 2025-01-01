<!-- resources/views/laporan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Laporan Keuangan Harian Otomatis</h1>
    <p class="text-center">Menghitung pendapatan dan pengeluaran harian secara otomatis, sehingga laporan keuangan lebih mudah dipantau dan akurat.</p>

    <div class="table-responsive">
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Pendapatan</th>
                <th>Pengeluaran</th>
                <th>Saldo</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            <tr>
                <td>{{ $laporan->tanggal }}</td>
                <td class="text-success">{{ number_format($laporan->pendapatan, 2) }}</td>
                <td class="text-danger">{{ number_format($laporan->pengeluaran, 2) }}</td>
                <td class="{{ ($laporan->pendapatan - $laporan->pengeluaran) >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($laporan->pendapatan - $laporan->pengeluaran, 2) }}
                </td>
                <td>
                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#pemasukan-{{ $loop->index }}" aria-expanded="false">
                        Detail Pemasukan
                    </button>
                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#pengeluaran-{{ $loop->index }}" aria-expanded="false">
                        Detail Pengeluaran
                    </button>
                </td>
            </tr>
            <tr class="collapse" id="pemasukan-{{ $loop->index }}">
                <td colspan="5">
                    <strong>Detail Pemasukan:</strong>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <th>Plat Nomor</th>
                                <th>Nama Pegawai</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporan->detail_pemasukan as $pemasukan)
                            <tr>
                                <td>{{ $pemasukan->vehicle_type }}</td>
                                <td>{{ $pemasukan->car_plate }}</td>
                                <td>{{ $pemasukan->employee_name }}</td>
                                <td>Rp {{ number_format($pemasukan->car_price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="collapse" id="pengeluaran-{{ $loop->index }}">
                <td colspan="5">
                    <strong>Detail Pengeluaran:</strong>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporan->detail_pengeluaran as $pengeluaran)
                            <tr>
                                <td>{{ $pengeluaran->nama_karyawan }}</td>
                                <td>Rp {{ number_format($pengeluaran->total_gaji, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Pendapatan Total</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($totalPendapatan, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Pengeluaran Total</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($totalPengeluaran, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white {{ $totalSaldo >= 0 ? 'bg-success' : 'bg-danger' }} mb-3">
                <div class="card-header">Saldo Total</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($totalSaldo, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection