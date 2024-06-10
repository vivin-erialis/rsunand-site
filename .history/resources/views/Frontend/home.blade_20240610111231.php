@extends('Frontend.layouts.main')
@section('title', 'Website Resmi')
@section('content')
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($slider as $slider)
                <div class="owl-carousel-item position-relative"
                    data-dot="<img src='{{ asset('../images/slider/' . $slider->img) }}'>">
                    <img class="img-fluid" src="{{ asset('images/slider/' . $slider->img) }}" alt=""
                        style="height: 400px; object-fit: cover;">
                    <div class="owl-carousel-inner home-img">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-12 col-lg-12 text-center">
                                    <h4 class="display-1 text-white animated slideInDown" style="font-size: vw !important">
                                        {{ $slider->title }}
                                    </h4>
                                    <p class="fs-7 fw-medium text-white mb-4 pb-3" style="font-size: 1vw !important">
                                        {{ $slider->desc }}
                                    </p>
                                    {{-- <a href="{{ $slider->link }}" class="py-3 px-5 btn-home fs-7 mt-3">SELENGKAPNYA</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">LAYANAN UNGGULAN</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            @if ($layanan->isEmpty())
                <h4 class="mt-5 text-center">Belum Ada Data</h4>
            @endif
            <div class="row g-4">
                @foreach ($layanan as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex position-relative text-center h-100" style="border-radius:10px">
                            @if ($item->gambar)
                                @php
                                    $gambarArray = json_decode($item->gambar);
                                    if ($gambarArray) {
                                        $gambarPertama = reset($gambarArray);
                                    }
                                @endphp

                                @if (!empty($gambarPertama))
                                    <a href="/layanan-unggulan/{{ $item->url }}">
                                        <img class="bg-img" src="{{ asset('/../images/layanan/' . $gambarPertama) }}">
                                    </a>
                                @endif
                            @endif
                            <div class="service-text p-5">
                                <i class="fa fa-hospital flex-shrink-0 mb-4" style="color: white; font-size: 40px"></i>
                                <h2 class="mb-3" style="color: white">{{ $item->nama_layanan }}</h2>
                                <p class="mb-4" style="font-size: 14px">{{ Str::limit($item->desc, 80, '...') }}.</p>
                                <a class="btn" href="/layanan-unggulan/{{ $item->url }}"><i
                                        class="fa fa-plus text-primary me-3"></i>Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

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
            <div class="row">
                <div class="col-lg-9">
                    <div class="container-berita-home">
                        @foreach ($artikel as $item)
                            <div class="card mb-4">
                                @if ($item->gambar)
                                    @php
                                        $gambarArray = json_decode($item->gambar);
                                        if ($gambarArray) {
                                            $gambarPertama = reset($gambarArray);
                                        }
                                    @endphp

                                    @if (!empty($gambarPertama))
                                        <img loading="lazy" class="card-img-top"
                                            src="{{ asset('/../images/artikel/' . $gambarPertama) }}"
                                            alt="{{ $item->title }}">
                                    @endif
                                @endif
                                <div class="card-body">
                                    <div class="me-2 mb-3" style="color: #1C7C3D">
                                        <span style="font-size: 12px" class="post-author">
                                            {{ $item->kategori->title }} |
                                        </span>
                                        <span style="font-size: 12px" class="post-meta-date">
                                            <i
                                                class="far fa-calendar me-2"></i>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM, Y') }}
                                        </span>
                                    </div>
                                    <a href="/berita/{{ $item->url }}">
                                        <h2 class="card-title">{{ $item->title }}</h2>
                                    </a>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->desc), 100, '...') }}</p>
                                    <a href="/berita/{{ $item->url }}" class="card-button">SELENGKAPNYA</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div>
                        <h2 class="mb-2" style="color: #1C7C3D;">Berita Terbaru</h2>
                        <hr>
                        @foreach ($recentPosts as $new)
                            <div class="row news-block news-block-two-col d-flex mt-4">
                                <div class="col-5 news-block-two-col-image-wrap">
                                    <a href="/blog/{{ $new->url }}">
                                        @if ($item->gambar)
                                            @php
                                                $gambarArray = json_decode($new->gambar);
                                                if ($gambarArray) {
                                                    $gambarPertama = reset($gambarArray);
                                                }
                                            @endphp

                                            @if (!empty($gambarPertama))
                                                <img loading="lazy" class="card-img-top"
                                                    src="{{ asset('/../images/artikel/' . $gambarPertama) }}"
                                                    alt="{{ $new->title }}">
                                            @endif
                                        @endif
                                    </a>
                                </div>

                                <div class="col-7 news-block-two-col-info">
                                    <div class="news-block-date">
                                        <p style="color: #1C7C3D">
                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                            {{ Carbon\carbon::parse($new->tanggal_berita)->isoFormat('D MMMM, Y') }}
                                        </p>
                                    </div>
                                    <div class="news-block-title mb-2">
                                        <a href="/berita/{{ $new->url }}">
                                            <h4 style="font-size: 18px" class="card-title">{{ $new->title }}</h4>
                                        </a>
                                    </div>
                                    <div>
                                        {{-- <p class="card-text">{{ Str::limit(strip_tags($new->desc), 100, '...') }}</p> --}}
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <br>
                    <div>
                        <h2 class="mb-4" style="color: #1C7C3D">Informasi Lainnya</h2>
                        <hr>
                        {{-- @foreach ($recentPosts as $new)
                            <div class="row news-block news-block-two-col d-flex mt-4">
                                <div class="col-5 news-block-two-col-image-wrap">
                                    <a href="/blog/{{ $new->url }}">
                                        @if ($item->gambar)
                                            @php
                                                $gambarArray = json_decode($item->gambar);
                                                if ($gambarArray) {
                                                    $gambarPertama = reset($gambarArray);
                                                }
                                            @endphp

                                            @if (!empty($gambarPertama))
                                                <img loading="lazy" class="card-img-top"
                                                    src="{{ asset('/../images/artikel/' . $gambarPertama) }}"
                                                    alt="{{ $item->title }}">
                                            @endif
                                        @endif
                                    </a>
                                </div>

                                <div class="col-7 news-block-two-col-info">
                                    <div class="news-block-date">
                                        <p>
                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                            {{ Carbon\carbon::parse($new->tanggal_berita)->isoFormat('D MMMM, Y') }}
                                        </p>
                                    </div>
                                    <div class="news-block-title mb-2">
                                        <h6 style="font-size: 16px;"><a href="/berita/{{ $new->url }}"
                                                class="news-block-title-link">{{ $new->title }}</a>
                                        </h6>
                                    </div>
                                    <div>
                                        <p class="card-text">{{ Str::limit(strip_tags($item->desc), 100, '...') }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">akreditasi </h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p> --}}
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-star flex-shrink-0 mt-1 mb-4"
                                    style="color: #1C7C3D; font-size: 20px; background: none; -webkit-text-stroke: 1px #1C7C3D; color: transparent;"></i>
                                </i>
                                <div class="ms-4">
                                    <h4>AKREDITASI TAHUN 2018</h4>
                                    <p class="mb-0" style="font-size: 15px">Akreditasi Rumah Sakit Unand pertama kali
                                        oleh Komite Akreditasi
                                        Rumah Sakit (KARS) pada tanggal 26 Desember tahun 2018 dengan Akreditasi
                                        <strong>PARIPURNA</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-star flex-shrink-0 mt-1 mb-4"
                                    style="color: #1C7C3D; font-size: 20px; background: none; -webkit-text-stroke: 1px #1C7C3D; color: transparent;"></i>
                                </i>
                                <div class="ms-4">
                                    <h4>AKREDITASI TAHUN 2022</h4>
                                    <p class="mb-0" style="font-size: 15px">Rumah Sakit Unand kembali meraih akreditasi
                                        <strong>PARIPURNA</strong> pada tanggal 3-4 November tahun 2022 oleh Lembaga
                                        Akreditasi Mutu dan Keselamatan Pasien Rumah Sakit (LAMKPRS)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-img">
                        <img class="img-fluid" src="img/about-2.jpg" alt="">
                        <img class="img-fluid" src="img/about-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    {{-- Bagian dan Instalasi --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Bagian dan Instalasi</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <div class="row g-4" style="padding:2vw 4vw">
                @forelse ($bagianInstalasi as $item)
                    <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex position-relative text-center h-100">
                            @if ($item->gambar)
                                @php
                                    $gambarArray = json_decode($item->gambar);
                                    if ($gambarArray) {
                                        $gambarPertama = reset($gambarArray);
                                    }
                                @endphp

                                @if (!empty($gambarPertama))
                                    <img loading="lazy" class="bg-img"
                                        src="{{ asset('/../images/artikel/' . $gambarPertama) }}">
                                @endif
                            @endif
                            <div class="service-text p-3 card-dokter" style="width: 100%">
                                @if ($item->gambar)
                                    @php
                                        $gambarArray = json_decode($item->gambar);
                                        if ($gambarArray) {
                                            $gambarPertama = reset($gambarArray);
                                        }
                                    @endphp

                                    @if (!empty($gambarPertama))
                                        <img loading="lazy" class="card-img"
                                            src="{{ asset('/../images/artikel/' . $gambarPertama) }}">
                                    @endif
                                @endif
                                <h6 class="mb-2 mt-3">{{ $item->title }}</h6>
                                <p class="mb-2">{!! $item->desc !!}</p>
                                <a style="font-size: 11px !important" class="btn"
                                    href="/bagian-instalasi/{{ $item->url }}"><i
                                        class="fa fa-plus text-primary me-4"></i>
                                    SELENGKAPNYA</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">Data Belum Tersedia</h4>
                @endforelse
            </div>
            <div style="text-align: center;">
                @if (!$bagianInstalasi->isEmpty())
                    <a class="btn btn-primary mt-4 py-2 px-4" href="/bagian-instalasi">LIHAT LEBIH BANYAK</a>
                @endif
            </div>

        </div>
    </div>

    {{-- About --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="/../assets/img/about-2.jpeg" alt="">
                        <img class="img-fluid" src="/../assets/img/about-1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">Sejarah</h4>
                    <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Univeristas Andalas</h1>
                    <p>Rumah Sakit Unand merupakan Rumah sakit Perguruan tinggi Negeri (RSPTN) yang berada dibawah
                        pengelolaan Universitas Andalas.</p>
                    <p class="mb-4">Perencanaan rumah sakit ini telah dimulai sejak tahun 2006 yang berkaitan dengan
                        adanya kebijakan untuk pendirian rumah sakit perguruan tinggi dan terbatasnya fasilitas pendidikan
                        di rumah sakit pendidikan utama di RS. M. Djamil, Padang.</p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary"
                            style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up">7</h1>
                        </div>
                        <div class="ps-4">
                            <h3>Sudah</h3>
                            <h3>Beroperasi</h3>
                            <h3 class="mb-0">Selama 7 tahun</h3>
                        </div>
                    </div>
                    <a class="btn btn-primary py-2 px-4" href="/tentang-kami">SELENGKAPNYA</a>
                </div>
            </div>
        </div>
    </div>




@endsection
