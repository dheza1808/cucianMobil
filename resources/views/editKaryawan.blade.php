@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Karyawan</h1>

    <form method="POST" action="{{ route('dataKaryawan.update', $karyawan->id) }}">
        @csrf
        @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT -->

        <div class="form-group">
            <label for="nama">Nama Karyawan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}" required>
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $karyawan->email) }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="posisi">Posisi</label>
            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $karyawan->posisi) }}" required>
            @error('posisi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="riwayat_kerja">Riwayat Kerja</label>
            <textarea class="form-control @error('riwayat_kerja') is-invalid @enderror" id="riwayat_kerja" name="riwayat_kerja">{{ old('riwayat_kerja', $karyawan->riwayat_kerja) }}</textarea>
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

        <button type="submit" class="btn btn-primary">Update Karyawan</button>
        <a href="{{ route('dataKaryawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection