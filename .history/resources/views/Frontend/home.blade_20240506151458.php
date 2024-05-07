@extends('Frontend.layouts.main')
@section('title', 'Website Resmi')
@section('content')
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-3.jpeg'>">
            <img class="img-fluid" src="/../assets/img/slide-1.jpeg" alt="">
            <div class="owl-carousel-inner home-img ">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-12 text-center">
                            <h4 class="display-1 text-white animated slideInDown" style="font-size: 64px !important">Rumah Sakit Pendidikan Universitas Andalas</h4>
                            <p class="fs-7 fw-medium text-white mb-4 pb-3">"Bekerja dengan Ilmu, Amal, dan Spiritual Demi Kemaslahatan Pasien"</p>
                            <a href="/tentang-kami" class="py-2 px-4 btn-home">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-2.jpeg'>">
            <img class="img-fluid" src="/../assets/img/slide-2.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            {{-- <h3 class="display-1 text-white animated slideInDown"> Rumah Sakit Pendidikan Universitas Andalas</h3> --}}
                            {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Menjadi Rumah Sakit Pendidikan yang Terkemuka dan Bermartabat di Sumatera Tahun 2022</p> --}}
                            {{-- <a href="/tentang-kami" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-3.jpeg'>">
            <img class="img-fluid" src="/../assets/img/slide-3.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            {{-- <h3 class="display-1 text-white animated slideInDown">Best Architecture And Interior Design Services</h3> --}}
                            {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p> --}}
                            {{-- <a href="/tentang-kami" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Facts --}}
{{-- <div class="container-xxl py-5">
    <div class="container pt-5">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-2.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Design Approach</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-3.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Innovative Solutions</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img src="/../assets/img/icons/icon-4.png" alt="Icon">
                    </div>
                    <h3 class="mb-3">Project Management</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- About --}}
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="/../assets/img/about1.jpg" alt="">
                    <img class="img-fluid" src="/../assets/img/about2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h4 class="section-title">Sejarah</h4>
                <h1 class="display-5 mb-4">A Creative Architecture Agency For Your Dream Home</h1>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                <div class="d-flex align-items-center mb-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                        <h1 class="display-1 mb-n2" data-toggle="counter-up">7</h1>
                    </div>
                    <div class="ps-4">
                        <h3>Years</h3>
                        <h3>Working</h3>
                        <h3 class="mb-0">Experience</h3>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5" href="/tentang-kami">Read More</a>
            </div>
        </div>
    </div>
</div>

{{-- Bagian dan Instalasi --}}
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Bagian dan Instalasi</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="/../assets/img/service-4.jpg" alt="">
                    <div class="service-text p-5">
                        <img class="mb-4" src="/../assets/img/icons/icon-8.png" alt="Icon">
                        <h3 class="mb-3">Interior Design</h3>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="/../assets/img/service-5.jpg" alt="">
                    <div class="service-text p-5">
                        <img class="mb-4" src="/../assets/img/icons/icon-9.png" alt="Icon">
                        <h3 class="mb-3">Renovation</h3>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="/../assets/img/service-6.jpg" alt="">
                    <div class="service-text p-5">
                        <img class="mb-4" src="/../assets/img/icons/icon-10.png" alt="Icon">
                        <h3 class="mb-3">Construction</h3>
                        <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read
                            More</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a class="btn btn-primary mt-4 py-3 px-5" href="/bagian-instalasi">SEE ALL</a>
        </div>
    </div>
</div>

{{-- Berita --}}
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Berita</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
        </div>
        @if ($artikel->isEmpty())
            <h4 class="mt-5 text-center">Belum Ada Artikel</h4>
        @endif
        <div class="container-berita">
            @foreach ($artikel as $item)
                <div class="card">
                    <img loading="lazy" class="card-img" src="{{ asset('/../images/artikel/' . $item->gambar) }}">

                    <div class="card-content">
                        <div class="me-2 mb-3" style="color: #1C7C3D">
                            <span style="font-size: 12px"class="post-author">
                                {{ $item->kategori->title }} | </a>
                            </span>
                            <span style="font-size: 12px" class="post-meta-date"><i
                                    class="far fa-calendar me-2"></i>{{ Carbon\carbon::parse($item->created_at)->isoFormat('D MMMM, Y') }}</span>

                        </div>
                        <a href="/berita/{{ $item->url }}">
                            <h2 class="card-title">{{ $item->title }}</h2>
                        </a>
                        {{-- <p style="color: #1C7C3D; "><i class="fa fa-calendar me-2"></i>{{ $item->created_at->format('d F Y') }}</p> --}}
                        <p class="card-text">{!! $item->desc !!}</p>
                        <a href="/berita/{{ $item->url }}" class="card-button">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
