@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Gaji Karyawan</h1>

    <form method="POST" action="{{ route('gaji.update', $gaji->id) }}">
        @csrf
        @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT -->

        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan', $gaji->nama_karyawan) }}" required>
            @error('nama_karyawan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jumlah_layanan">Jumlah Layanan</label>
            <input type="number" class="form-control @error('jumlah_layanan') is-invalid @enderror" id="jumlah_layanan" name="jumlah_layanan" value="{{ old('jumlah_layanan', $gaji->jumlah_layanan) }}" required min="0">
            @error('jumlah_layanan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga_mobil">Harga Mobil</label>
            <input type="number" class="form-control @error('harga_mobil') is-invalid @enderror" id="harga_mobil" name="harga_mobil" value="{{ old('harga_mobil', $gaji->harga_mobil) }}" required min="0" step="0.01">
            @error('harga_mobil')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pinjaman">Pinjaman</label>
            <input type="number" class="form-control @error('pinjaman') is-invalid @enderror" id="pinjaman" name="pinjaman" value="{{ old('pinjaman', $gaji->pinjaman) }}" min="0" step="0.01">
            @error('pinjaman')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jumlah_karpet">Jumlah Karpet</label>
            <input type="number" class="form-control @error('jumlah_karpet') is-invalid @enderror" id="jumlah_karpet" name="jumlah_karpet" value="{{ old('jumlah_karpet', $gaji->jumlah_karpet) }}" min="0">
            @error('jumlah_karpet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga_cuci_karpet">Harga Cuci Karpet</label>
            <input type="number" class="form-control @error('harga_cuci_karpet') is-invalid @enderror" id="harga_cuci_karpet" name="harga_cuci_karpet" value="{{ old('harga_cuci_karpet', $gaji->harga_cuci_karpet) }}" min="0" step="0.01">
            @error('harga_cuci_karpet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Gaji</button>
        <a href="{{ route('gaji.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection