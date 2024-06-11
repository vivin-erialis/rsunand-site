@extends('Frontend.layouts.main')
@section('title', 'Video')
@section('content')
    @include('Frontend.layouts.header')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="section-title">Galeri Video</h2>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Alamat</p>
                                <h3 class="mb-0">Komp Kampus Unand Limau Manis Padang Sumatera Barat

                                </h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Kontak</p>
                                <h3 class="mb-0">0751 - 8465000, 0751 - 8465001</h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Email</p>
                                <h3 class="mb-0">rs.unand2016@gmail.com</h3>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->


@endsection
