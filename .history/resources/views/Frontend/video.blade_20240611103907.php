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
            @if ($videos->isEmpty())
                <p>Belum ada video yang tersedia.</p>
            @else
                @foreach ($videos as $video)
                    <div class="video-container">
                        <iframe width="560" height="315" src="{{ $video->youtube_link }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                @endforeach
            @endif


        </div>
    </div>
    <!-- Contact End -->


@endsection
