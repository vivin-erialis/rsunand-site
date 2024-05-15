@extends('Frontend.layouts.main')
@section('title', 'Kontak')
@section('content')
    @include('Frontend.layouts.header')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Hubungi Kami</h4>
                {{-- <h1 class="display-5 mb-4">If You Have Any Query, Please Feel Free Contact Us</h1> --}}
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
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
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with
                        Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done.</p> --}}
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Alamat Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3033820359447!2d100.45395997358297!3d-0.9205414353328706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7998d0add5d%3A0x30d2b69478a7bb30!2sRumah%20Sakit%20Universitas%20Andalas!5e0!3m2!1sid!2sid!4v1715135853543!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Google Map End -->
@endsection