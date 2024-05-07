@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="detail-berita" style="justify-content: center">
                    <div class="">
                        <img loading="lazy" class="" src="{{ asset('/../images/artikel/' . $berita->gambar) }}">
                        <div class="">
                            <h2 class=""></h2>
                            <p class="">{!! $berita->isi !!}</p>
                            <a href="/berita" class="card-button">Kembali</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
