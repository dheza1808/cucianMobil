@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fw-bold mb-4">📝 Tambah Laporan Keuangan Harian</h1>
    
    <form action="{{ route('laporan.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required>
                @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <h5 class="fw-bold">Pendapatan</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="pendapatan_mobil" class="form-label">Pendapatan Mobil</label>
                <input type="number" step="0.01" name="pendapatan_mobil" id="pendapatan_mobil" class="form-control @error('pendapatan_mobil') is-invalid @enderror" value="{{ old('pendapatan_mobil') }}" required>
                @error('pendapatan_mobil') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label for="pendapatan_minuman" class="form-label">Pendapatan Minuman</label>
                <input type="number" step="0.01" name="pendapatan_minuman" id="pendapatan_minuman" class="form-control @error('pendapatan_minuman') is-invalid @enderror" value="{{ old('pendapatan_minuman') }}" required>
                @error('pendapatan_minuman') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label for="pendapatan_parfum" class="form-label">Pendapatan Parfum</label>
                <input type="number" step="0.01" name="pendapatan_parfum" id="pendapatan_parfum" class="form-control @error('pendapatan_parfum') is-invalid @enderror" value="{{ old('pendapatan_parfum') }}" required>
                @error('pendapatan_parfum') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <h5 class="fw-bold">Pengeluaran</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="pengeluaran_galon" class="form-label">Pengeluaran Galon</label>
                <input type="number" step="0.01" name="pengeluaran_galon" id="pengeluaran_galon" class="form-control @error('pengeluaran_galon') is-invalid @enderror" value="{{ old('pengeluaran_galon') }}" required>
                @error('pengeluaran_galon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label for="pengeluaran_sabun" class="form-label">Pengeluaran Sabun Mobil</label>
                <input type="number" step="0.01" name="pengeluaran_sabun" id="pengeluaran_sabun" class="form-control @error('pengeluaran_sabun') is-invalid @enderror" value="{{ old('pengeluaran_sabun') }}" required>
                @error('pengeluaran_sabun') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4">
                <label for="pengeluaran_lainnya" class="form-label">Pengeluaran Lainnya</label>
                <input type="number" step="0.01" name="pengeluaran_lainnya" id="pengeluaran_lainnya" class="form-control @error('pengeluaran_lainnya') is-invalid @enderror" value="{{ old('pengeluaran_lainnya') }}" required>
                @error('pengeluaran_lainnya') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Laporan</button>
    </form>
</div>
@endsection
