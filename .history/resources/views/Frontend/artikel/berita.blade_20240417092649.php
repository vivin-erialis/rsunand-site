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
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="gambar-berita">
                        <img src="/../assets/img/slide-1.jpg" alt="">

                    </div>
                    <div class="isi-berita">
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt dolor dolores mollitia. Ut repellat voluptatibus dignissimos voluptatum, officia a beatae commodi ab quidem atque ullam, tempore laborum optio cumque vel!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
