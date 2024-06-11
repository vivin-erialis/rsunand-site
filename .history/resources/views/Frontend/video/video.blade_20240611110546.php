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
                @foreach ($video as $video)
                        <div class="row">
                            <div class="col-md-3">
                                <iframe src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                            </div>

                        </div>
                    <p><a href="/video/{{ $video->url }}">{{ $video->judul }}</a></p>
                @endforeach
            @endif


        </div>
    </div>
    <!-- Contact End -->


@endsection
