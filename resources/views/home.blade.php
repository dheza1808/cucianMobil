<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h2 class="card-title text-primary">Selamat Datang di Aplikasi Cucian Mobil Kuantan Raya</h2>
                            <p class="mb-4">Kami siap memberikan layanan terbaik untuk menjaga kebersihan mobil Anda.</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="../assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Statistik Hari Ini</h5>
                </div>
                <div class="card-body">
                    <p>Total Mobil Dicuci: <strong>25</strong></p>
                    <p>Total Pendapatan: <strong>Rp 1.500.000</strong></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Jadwal Cucian</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>Mobil A - 10:00</li>
                        <li>Mobil B - 11:00</li>
                        <li>Mobil C - 12:00</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h5>Pengumuman</h5>
                </div>
                <div class="card-body">
                    <p>Promo Diskon 20% untuk cucian mobil setiap hari Senin!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h4>Informasi Kontak</h4>
        <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di:</p>
        <p>Email: <a href="mailto:support@cucianmobilkuantanraya.com">support@cucianmobilkuantanraya.com</a></p>
        <p>Telepon: <strong>(0751) 123456</strong></p>
    </div>
</div>
@endsection