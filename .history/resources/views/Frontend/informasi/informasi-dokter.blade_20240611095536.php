@extends('Frontend.layouts.main')
@section('title', 'Informasi Dokter')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"> DOKTER KAMI</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>
            @include('Frontend.informasi.sidebar')
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-0 team-items">
                      @forelse ($dokter as $data)
                      <div class=" col-md-4 wow fadeInUp card-dokter mx-2" data-wow-delay="0.3s">
                        <div class="row team-item position-relative">
                            <div class="col-md-4 position-relative">
                                <img class="img-fluid" src="../images/dokter/{{ $data->foto }}" alt="{{ $data->foto }}">
                            </div>
                            <div class="col-md-8 bg-light p-3">
                                <h5 class="mt-1">{{$data->nama}}</h5>
                               <strong> <span class="text-primary" style="font-size: 13px">Dokter {{$data->spesialis->title}}</span></strong>
                               <p>Pendidikan : {!! $data->pendidikan !!}</p>
                            </div>
                        </div>
                    </div>
                      @empty
                          <h4 class="text-center"><strong>Data Belum Tersedia</strong></h4>
                      @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
