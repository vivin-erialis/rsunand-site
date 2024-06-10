@extends('Frontend.layouts.main')
@section('title', 'Website Resmi')
@section('content')
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($slider as $slider)
                <div class="owl-carousel-item position-relative"
                    data-dot="<img src='{{ asset('../images/slider/' . $slider->img) }}'>">
                    <img class="img-fluid" src="{{ asset('images/slider/' . $slider->img) }}" alt="" style="height: 400px; object-fit: cover;">
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
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Layanan Unggulan</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            @if ($layanan->isEmpty())
                <h4 class="mt-5 text-center">Belum Ada Data</h4>
            @endif
            <div class="container-berita">
                @foreach ($layanan as $item)
                    <div class="card">
                        @if ($item->gambar)
                            @php
                                $gambarArray = json_decode($item->gambar);
                                if ($gambarArray) {
                                    $gambarPertama = reset($gambarArray);
                                }
                            @endphp

                            @if (!empty($gambarPertama))
                                <img loading="lazy" class="card-img"
                                    src="{{ asset('/../images/layanan/' . $gambarPertama) }}">
                            @endif
                        @endif

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                                <div class="fact-icon">
                                    <img src="/../assets/img/icons/icon-2.png" alt="Icon">
                                </div>
                                <h3 class="mb-3">Design Approach</h3>
                                <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                            <a href="/berita/{{ $item->url }}" class="card-button">SELENGKAPNYA</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
