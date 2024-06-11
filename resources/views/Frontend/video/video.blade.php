@extends('Frontend.layouts.main')
@section('title', 'Video')
@section('content')
    @include('Frontend.layouts.header')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="section-title">Galeri Video</h2>
                <h1 class="display-5 mb-4">Rumah Sakit Universitas Andalas</h1>
            </div>

            <!-- Di dalam file Blade Anda -->
            @if ($video->isEmpty())
                <p>Belum ada video yang tersedia.</p>
            @else
                <div class="row">
                    @foreach ($video as $video)
                        <div class="col-md-4">
                            <iframe src="{{ $video->link }}" style="width: 100%; height: 230px;" frameborder="0"
                                allowfullscreen></iframe>
                            <hr>
                            <a href="/video/{{ $video->url }}">
                                <h2 class="card-title text-center">{{ $video->judul }}</h2>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif


        </div>
    </div>
    <!-- Contact End -->
@endsection
