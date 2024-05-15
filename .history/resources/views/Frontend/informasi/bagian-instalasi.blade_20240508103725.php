@extends('Frontend.layouts.main')
@section('title', 'Bagian dan Instalasi')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Bagian dan Instalasi --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Bagian dan Instalasi</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <div class="row g-4">
                @forelse ($bagianInstalasi as $item)
                    <div class="col-lg-4 col-md-4 wow fadeInUp style="padding: 5vw""  data-wow-delay="0.1s">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <img class="bg-img" src="../images/artikel/{{$item->gambar}}" alt="">
                            <div class="service-text p-3 card-dokter" style="width: 100%">
                                <img class="mb-3 mt-2" style="width: 250px" src="../images/artikel/{{$item->gambar}}" alt="Icon">
                                <h5 class="mb-2">{{ $item->title }}</h5>
                                <p class="mb-2">{!! $item->desc !!}</p>
                                <a style="font-size: 12px !important" class="btn" href="/bagian-instalasi/{{$item->url}}"><i class="fa fa-plus text-primary me-3"></i>
                                    SELENGKAPNYA</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">Data Belum Tersedia</h4>
                @endforelse
            </div>
            {{-- <a class="btn btn-primary mt-3 py-3 px-5" href="">Read More</a> --}}

        </div>
    </div>
@endsection
