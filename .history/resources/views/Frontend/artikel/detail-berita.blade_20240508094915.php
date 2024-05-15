@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="p">
        <div class="container">
            <div class="">
                    <div class="">
                        <img loading="lazy" class="" style="width: 100%" src="{{ asset('/../images/artikel/' . $berita->gambar) }}">
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
