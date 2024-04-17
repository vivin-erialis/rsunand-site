@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Berita</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <div class="card">
                <img src="/../assets/img/slide-2.jpg" alt="Placeholder Image" class="card-image">
                <div class="card-content">
                  <h2 class="card-title">Card Title</h2>
                  <p class="card-text">This is a simple card with some sample text. You can replace this text with your own content.</p>
                  <a href="/berita" class="card-button">Read More</a>
                </div>
              </div>
        </div>
    </div>
@endsection
