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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <img class="bg-img" src="../images/artikel/{{$item->gambar}}" alt="">
                            <div class="service-text p-5" style="width: 100%">
                                <img class="mb-4" style="width: 200px" src="../images/artikel/{{$item->gambar}}" alt="Icon">
                                <h3 class="mb-3">{{ $item->title }}</h3>
                                <p class="mb-4">{!! $item->desc !!}</p>
                                <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read
                                    More</a>
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
