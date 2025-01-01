<!-- resources/views/createKaryawan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Karyawan</h1>

    <form action="{{ route('dataKaryawan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Perhatian!</strong> Harap perbaiki kesalahan berikut:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama karyawan" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Karyawan</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email karyawan" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" placeholder="Masukkan posisi" value="{{ old('posisi') }}">
            @error('posisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="riwayat_kerja" class="form-label">Riwayat Kerja</label>
            <textarea class="form-control @error('riwayat_kerja') is-invalid @enderror" id="riwayat_kerja" name="riwayat_kerja" placeholder="Masukkan riwayat kerja">{{ old('riwayat_kerja') }}</textarea>
            @error('riwayat_kerja')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="foto_ktp" class="form-label">Foto KTP</label>
            <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" id="foto_ktp" name="foto_ktp" accept="image/*">
            <small class="form-text text-muted">Unggah foto KTP dalam format .jpg, .jpeg, atau .png.</small>
            @error('foto_ktp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_masuk_kerja" class="form-label">Tanggal Masuk Kerja</label>
            <input type="date" class="form-control @error('tanggal_masuk_kerja') is-invalid @enderror" id="tanggal_masuk_kerja" name="tanggal_masuk_kerja" value="{{ old('tanggal_masuk_kerja') }}">
            @error('tanggal_masuk_kerja')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan Karyawan</button>
            <a href="{{ route('dataKaryawan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection