@extends('Frontend.layouts.main')
@section('title', 'Ilmiah')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Ilmiah --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Ilmiah</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            @if ($ilmiah->isEmpty())
                <h4 class="mt-5 text-center">Belum Ada Artikel</h4>
            @endif
            <dvi class="container-berita">

                @foreach ($ilmiah as $item)
                    <div class="card">
                        <img loading="lazy" class="card-img" src="{{ asset('/images/artikel/' . $item->gambar) }}">
                        <div class="card-content">
                            <h2 class="card-title">{{ $item->title }}</h2>
                            <p class="card-text">{!! $item->desc !!}</p>
                            <a href="/berita" class="card-button">Read More</a>
                        </div>
                    </div>
                @endforeach

            </dvi>
        </div>
    </div>
@endsection
