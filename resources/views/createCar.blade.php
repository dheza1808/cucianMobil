@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Mobil Masuk</h1>

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="vehicle_type">Jenis Kendaraan</label>
            <select class="form-control @error('vehicle_type') is-invalid @enderror" id="vehicle_type" name="vehicle_type" required>
                <option value="">Pilih Jenis Kendaraan</option>
                <option value="mobil">Mobil</option>
                <option value="motor">Motor</option>
            </select>
            @error('vehicle_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="car_plate">Nomor Plat Mobil</label>
            <input type="text" class="form-control @error('car_plate') is-invalid @enderror" id="car_plate" name="car_plate" placeholder="Masukkan nomor plat mobil" required>
            @error('car_plate')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_type">Jenis Layanan</label>
            <select class="form-control @error('service_type') is-invalid @enderror" id="service_type" name="service_type" required>
                <option value="">Pilih Jenis Layanan</option>
                <option value="cuci_body">Cuci Body</option>
                <option value="cuci_steam">Cuci Steam</option>
            </select>
            @error('service_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="payment_status">Status Pembayaran</label>
            <select class="form-control @error('payment_status') is-invalid @enderror" id="payment_status" name="payment_status" required>
                <option value="">Pilih Status Pembayaran</option>
                <option value="lunas">Lunas</option>
                <option value="belum_lunas">Belum Lunas</option>
            </select>
            @error('payment_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_time">Waktu Layanan</label>
            <input type="datetime-local" class="form-control @error('service_time') is-invalid @enderror" id="service_time" name="service_time" required>
            @error('service_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="employee_name">Nama Karyawan</label>
            <select class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" required>
                <option value="">Pilih Nama Karyawan</option>
                <option value="yudi">Yudi</option>
                <option value="putra">Putra</option>
                <option value="ilham">Ilham</option>
                <option value="fajri">Fajri</option>
            </select>
            @error('employee_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="remarks">Keterangan</label>
            <select class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks" required>
                <option value="">Pilih Keterangan</option>
                <option value="ditinggal">Ditinggal</option>
                <option value="ditunggu">Ditunggu</option>
            </select>
            @error('remarks')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input untuk Harga Mobil dengan format pemisah ribuan -->
        <div class="mb-3">
    <label for="car_price" class="form-label">Harga</label>
    <input type="number" class="form-control" id="car_price" name="car_price" required>
</div>

        <script>
            function formatCurrency(input) {
                // Menghapus semua karakter yang bukan angka
                let value = input.value.replace(/[^0-9]/g, '');

                // Mengubah menjadi format pemisah ribuan
                if (value) {
                    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Format dengan pemisah ribuan
                    document.getElementById('car_price').value = value; // Simpan nilai asli di input tersembunyi
                } else {
                    input.value = '';
                    document.getElementById('car_price').value = ''; // Kosongkan input tersembunyi
                }
            }
        </script>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection