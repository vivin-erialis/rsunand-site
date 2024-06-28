@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
@include('Frontend.layanan.header-layanan')
    <section id="layanan" class="layanan bg-section">
        <div class="container" style="font-size: 15px !important;">
            @php
                // Ambil path gambar dari database
                $gambar = $layanan->thumbnail;
                $backgroundImage = asset('/../images/layanan/' . $gambar);
            @endphp
            <div class="background-div" style="background-image: url('{{ $backgroundImage }}'); height: 400px; width: 100%; background-size: cover; background-position: center;">
            </div>

            <div class="artikel-layanan">
                <p>{!! $layanan->desc !!}</p>
            </div>
        </div>
    </section>
    <style>
        #layanan {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 73%;
        }

        .artikel-layanan {
            text-align: justify;
            padding-top: 30px;
        }
    </style>
@endsection
