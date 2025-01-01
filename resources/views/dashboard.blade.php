@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4 order-0">
            <div class="card border-0 shadow">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h2 class="card-title text-primary fw-bold">Selamat Datang di Aplikasi Cucian Mobil Kuantan Raya</h2>
                            <p class="mb-4 text-muted">Layanan profesional untuk menjaga kebersihan mobil Anda.</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center">
                        <div class="card-body px-0">
                            <img
                                src="../assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="Illustration"
                                class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Jadwal Cucian</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>07:00 WIB - 22:00 WIB</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Pengumuman</h5>
                </div>
                <div class="card-body">
                    <p class="mb-0">7X CUCI GRATIS 1X CUCI</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h4>Kontak</h4>
        <p>Email: <a href="mailto:support@cucianmobilkuantanraya.com" class="text-primary">support@cucianmobilkuantanraya.com</a></p>
        <p>Telepon: <strong>(0751) 123456</strong></p>
    </div>
</div>
@endsection
