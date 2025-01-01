@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Mobil Masuk</h1>

    <form method="POST" action="{{ route('cars.update', $car->id) }}">
        @csrf
        @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT -->

        <div class="form-group">
            <label for="car_plate">Nomor Plat Mobil</label>
            <input type="text" class="form-control @error('car_plate') is-invalid @enderror" id="car_plate" name="car_plate" value="{{ old('car_plate', $car->car_plate) }}" required>
            @error('car_plate')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_type">Jenis Layanan</label>
            <select class="form-control @error('service_type') is-invalid @enderror" id="service_type" name="service_type" required>
                <option value="">Pilih Jenis Layanan</option>
                <option value="cuci_body" {{ $car->service_type == 'cuci_body' ? 'selected' : '' }}>Cuci Body</option>
                <option value="cuci_steam" {{ $car->service_type == 'cuci_steam' ? 'selected' : '' }}>Cuci Steam</option>
            </select>
            @error('service_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="payment_status">Status Pembayaran</label>
            <select class="form-control @error('payment_status') is-invalid @enderror" id="payment_status" name="payment_status" required>
                <option value="">Pilih Status Pembayaran</option>
                <option value="lunas" {{ $car->payment_status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="belum_lunas" {{ $car->payment_status == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
            @error('payment_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="service_time">Waktu Layanan</label>
            <input type="datetime-local" class="form-control @error('service_time') is-invalid @enderror" id="service_time" name="service_time" value="{{ \Carbon\Carbon::parse($car->service_time)->format('Y-m-d\TH:i') }}" required>
            @error('service_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group">
            <label for="employee_name">Nama Karyawan</label>
            <select class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" required>
                <option value="">Pilih Nama Karyawan</option>
                <option value="yudi" {{ $car->employee_name == 'yudi' ? 'selected' : '' }}>Yudi</option>
                <option value="putra" {{ $car->employee_name == 'putra' ? 'selected' : '' }}>Putra</option>
                <option value="ilham" {{ $car->employee_name == 'ilham' ? 'selected' : '' }}>Ilham</option>
                <option value="fajri" {{ $car->employee_name == 'fajri' ? 'selected' : '' }}>Fajri</option>
            </select>
            @error('employee_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
        <label for="vehicle_type">Jenis Kendaraan</label>
            <input type="text" class="form-control @error('vehicle_type') is-invalid @enderror" id="vehicle_type" name="vehicle_type" value="{{ old('vehicle_type', $car->vehicle_type) }}" required>
            @error('vehicle_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="car_price">Harga</label>
            <input type="number" class="form-control @error('car_price') is-invalid @enderror" id="car_price" name="car_price" value="{{ old('car_price', $car->car_price) }}">
            @error('car_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label for="remarks">Keterangan</label>
            <select class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks" required>
                <option value="">Pilih Keterangan</option>
                <option value="ditinggal" {{ $car->remarks == 'ditinggal' ? 'selected' : '' }}>Ditinggal</option>
                <option value="ditunggu" {{ $car->remarks == 'ditunggu' ? 'selected' : '' }}>Ditunggu</option>
            </select>
            @error('remarks')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection