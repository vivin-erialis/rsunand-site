@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-3">
                    @foreach(json_decode($berita->gambar) as $gambar)
                        <img loading="lazy" class="" style="width: 100%" src="{{ asset('/../images/artikel/' . $gambar) }}">
                    @endforeach
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
