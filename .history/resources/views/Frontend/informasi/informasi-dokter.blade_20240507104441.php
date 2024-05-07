@extends('Frontend.layouts.main')
@section('title', 'Informasi Dokter')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"> DOKTER KAMI</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            @include('Frontend.informasi.sidebar')
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-0 team-items">
                      @forelse ($dokter as $data)
                      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="../images/dokter/{{ $data->foto }}" alt="{{ $data->foto }}">
                                {{-- <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i
                                            class="fab fa-instagram"></i></a>
                                </div> --}}
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2">{{$data->nama}}</h3>
                                <span class="text-primary">Dokter {{$data->spesialis->title}}</span>
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
