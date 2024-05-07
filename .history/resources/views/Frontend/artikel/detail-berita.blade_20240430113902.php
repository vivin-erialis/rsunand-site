@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Berita</h4>
                <h1 class="display-5 mb-4">{{ $berita->title }}</h1>
            </div>

            <div class="container-berita">
                    <div class="card">
                        <img loading="lazy" class="" src="{{ asset('/../images/artikel/' . $berita->gambar) }}">
                        <div class="">
                            <h2 class=""></h2>
                            <p class="">{!! $berita->desc !!}</p>
                            <a href="/berita" class="card-button">Kembali</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
