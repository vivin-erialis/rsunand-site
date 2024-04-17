@extends('Frontend.layouts.main')
@section('carousel')
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-1.jpg'>">
            <img class="img-fluid" src="/../assets/img/slide-1.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h3 class="display-1 text-white animated slideInDown">Selamat Datang di Rumah Sakit Pendidikan Universitas Andalas</h3>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Bekerja dengan Ilmu, Amal, dan Spiritual Demi Kemaslahatan Pasien</p>
                            <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-2.jpg'>">
            <img class="img-fluid" src="/../assets/img/slide-2.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h3 class="display-1 text-white animated slideInDown"> Rumah Sakit Pendidikan Universitas Andalas</h3>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Menjadi Rumah Sakit Pendidikan yang Terkemuka dan Bermartabat di Sumatera Tahun 2022</p>
                            <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-3.jpg'>">
            <img class="img-fluid" src="/../assets/img/slide-3.jpg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h3 class="display-1 text-white animated slideInDown">Best Architecture And Interior Design Services</h3>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Facts --}}
<div class="container-xxl py-5">
    <div class="container pt-5">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="fact-item text-center bg-dark h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-2.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Design Approach</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="fact-item text-center bg-dark h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-3.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Innovative Solutions</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="fact-item text-center bg-dark h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-4.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Project Management</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
