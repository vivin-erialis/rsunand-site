@extends('Frontend.layouts.main')
@section('title', 'Rektor Universitas Andalas')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project">
        <div class="container">
            <div class="container-xxl">
                <div class="container">
                    @foreach ($data as $item)
                        <div class="row g-5">
                            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="text-align: center">
                                <!-- <div class="card"> -->
                                    <img class="img-fluid" src="{{ asset('/../images/dokter/' . $item->foto) }}" alt="{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}" style="width: 250px; border-radius: 10px;">
                                <!-- </div> -->
                            </div>
                            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                                <div style="text-align: justify; padding-top: 20px;">
                                    <h3 class="section-title">{{ $item->desc_jabatan }}</h3>
                                    <h3 style=""> {{ $item->gelar_depan }} {{ $item->nama }},  {{ $item->gelar_belakang }}</h3>
                                    <p class="mb-4">{{ $item->pendidikan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
