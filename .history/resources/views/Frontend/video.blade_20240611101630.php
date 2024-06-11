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
                <div class="col-md-7">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3033820359447!2d100.45395997358297!3d-0.9205414353328706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7998d0add5d%3A0x30d2b69478a7bb30!2sRumah%20Sakit%20Universitas%20Andalas!5e0!3m2!1sid!2sid!4v1715135853543!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->


@endsection
