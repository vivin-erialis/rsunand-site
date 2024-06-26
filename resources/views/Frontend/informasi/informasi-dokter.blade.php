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
                            <div class=" col-md-4 p-3 wow fadeInUp " data-wow-delay="0.3s">
                                <div class="row team-item position-relative card-dokter">
                                    <div class="col-md-5 position-relative text-center">
                                        <img class="img-fluid m-2"
                                            src="{{ empty($data->foto) ? asset('assets/img/rsunandlogo.png') : asset('images/dokter/' . $data->foto) }}"
                                           >
                                    </div>
                                    <div class="col-md-7 bg-light p-3">
                                        <h5 class="mt-1">{{ $data->gelar_depan  ?? '-' }} {{ $data->nama ?? '-' }}
                                            {{ $data->gelar_belakang }}</h5>
                                        {{-- <strong> <span class="text-primary" style="font-size: 13px">Dokter {{$data->spesialis->title}}</span></strong> --}}
                                        <?php if ($data->title != 'Umum') { ?>
                                            <p>Dokter Spesialis {!! $data->title !!}</p>
                                        <?php } else { ?>
                                            <p>Dokter {!! $data->title !!}</p>
                                        <?php } ?>
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
