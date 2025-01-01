@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Gaji Karyawan</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk menghitung gaji karyawan.</p>

    <form action="{{ route('gaji.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <!-- Nama Karyawan -->
        <div class="mb-3">
            <label for="employee_name" class="form-label">Nama Karyawan</label>
            <select class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" name="nama_karyawan" required>
                <option value="">Pilih Nama Karyawan</option>
                @foreach ($karyawans as $karyawan)
                    <option value="{{ $karyawan->nama }}">{{ $karyawan->id }} - {{ $karyawan->nama }}</option>
                @endforeach
            </select>
            @error('employee_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jumlah Layanan -->
        <div class="mb-3">
            <label for="jumlah_layanan" class="form-label">Jumlah Layanan</label>
            <input type="number" class="form-control @error('jumlah_layanan') is-invalid @enderror" id="jumlah_layanan" name="jumlah_layanan" value="1" required>
            @error('jumlah_layanan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga Mobil -->
        <div class="mb-3">
            <label for="harga_mobil" class="form-label">Harga Mobil</label>
            <input type="number" class="form-control @error('harga_mobil') is-invalid @enderror" id="harga_mobil" name="harga_mobil" required>
            @error('harga_mobil')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <!-- Pinjaman -->
        <div class="mb-3">
            <label for="pinjaman" class="form-label">Pinjaman</label>
            <input type="number" step="0.01" class="form-control" id="pinjaman" name="pinjaman" value="0">
        </div>

        <!-- Opsi Cuci Karpet -->
        <div class="mb-3">
            <label for="cuci_karpet" class="form-label">Mencuci Karpet</label>
            <select class="form-control" id="cuci_karpet" name="cuci_karpet" required>
                <option value="tidak">Tidak</option>
                <option value="ya">Ya</option>
            </select>
        </div>

        <!-- Jumlah dan Harga Cuci Karpet -->
        <div class="mb-3" id="karpet_details" style="display: none;">
            <label for="jumlah_karpet" class="form-label">Jumlah Karpet yang Dicuci</label>
            <input type="number" class="form-control" id="jumlah_karpet" name="jumlah_karpet" value="0">
        </div>
        <div class="mb-3" id="harga_karpet" style="display: none;">
            <label for="harga_cuci_karpet" class="form-label">Harga Cuci Karpet</label>
            <input type="text" class="form-control" id="harga_cuci_karpet" name="harga_cuci_karpet" value="0">
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan Gaji Karyawan</button>
        <a href="{{ route('gaji.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Script Interaktif -->
<script>
    // Fungsi untuk memformat angka menjadi format mata uang
    function formatCurrency(value) {
        return value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Input untuk Harga Mobil
    document.getElementById('harga_mobil').addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9.]/g, '');
        e.target.value = formatCurrency(value);
    });

    // Menampilkan input tambahan jika mencuci karpet dipilih
    document.getElementById('cuci_karpet').addEventListener('change', function() {
        const karpetDetails = document.getElementById('karpet_details');
        const hargaKarpet = document.getElementById('harga_karpet');
        if (this.value === 'ya') {
            karpetDetails.style.display = 'block';
            hargaKarpet.style.display = 'block';
        } else {
            karpetDetails.style.display = 'none';
            hargaKarpet.style.display = 'none';
            document.getElementById('jumlah_karpet').value = 0;
            document.getElementById('harga_cuci_karpet').value = '';
        }
    });

    // Input untuk Harga Cuci Karpet
    document.getElementById('harga_cuci_karpet').addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9.]/g, '');
        e.target.value = formatCurrency(value);
    });
</script>
@endsection