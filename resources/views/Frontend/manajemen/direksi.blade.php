@extends('Frontend.layouts.main')
@section('title', 'Direksi RS Universitas Andalas')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="container-xxl py-5">
                <div class="container">
                    @foreach ($direksi as $item)
                        @if ($item->id_jabatan == 1)
                            <div class="row g-5">
                                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                                    <h3 class="section-title" style="letter-spacing: 1px;">{{ $item->desc_jabatan }}</h3>
                                    <div style="font-size: 14px; text-align: justify">
                                        <h3 style=""> {{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}</h3>
                                        <p class="mb-4">{!! $item->pendidikan !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                    <!-- <div class="about-img"> -->
                                        <img class="img-fluid" src="{{ asset('/../images/dokter/' . $item->foto) }}" alt="{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}" style="width: 250px; border-radius: 10px;">
                                    <!-- </div> -->
                                </div>
                            </div>
                        @else
                        <hr>
                        <div class="row g-5">
                            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                <!-- <div class="card"> -->
                                    <img class="img-fluid" src="{{ asset('/../images/dokter/' . $item->foto) }}" alt="{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}" style="width: 250px; border-radius: 10px;">
                                <!-- </div> -->
                            </div>
                            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                                <div style="text-align: justify; padding-top: 20px;">
                                    <h3 class="section-title">{{ $item->desc_jabatan }}</h3>
                                    <h3 style=""> {{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}</h3>
                                    <p class="mb-4">{{ $item->pendidikan }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
