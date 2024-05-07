@extends('Frontend.layouts.main')
@section('title', 'Berita')

@section('content')
@include('Frontend.artikel.header-artikel')
    {{-- Berita --}}
    <div class="detail-berita py-5">
        <div class="container">
            <div class="d-flex justify-content-center"> <!-- Menggunakan flexbox untuk menengahkan konten -->
                <div class="">
                    <img loading="lazy" class="" src="{{ asset('/../images/artikel/' . $berita->gambar) }}">
                    <div class="">
                        <h2 class="text-center">{{ $headerStart }}</h2> <!-- Menambahkan judul artikel di tengah -->
                        <p class="text-center">{!! $berita->isi !!}</p> <!-- Mengatur konten di tengah -->
                        <a href="/berita" class="card-button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
