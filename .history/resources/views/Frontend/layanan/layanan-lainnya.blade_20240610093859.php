@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Layanan Lainnya')
@include('Frontend.layouts.header')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">LAYANAN lainnya</h4>
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
                            <a class="btn" href="/layanan/{{ $item->url }}"><i
                                    class="fa fa-plus text-primary me-3"></i>Read
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
