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

            <div class="mt-2 px-2">
                @if(!empty($gambar))
                    <h3>Foto Lainnya</h3>
                    <div class="slider-wrapper">
                        @foreach($gambar as $index => $img)
                            @if($index > 0) <!-- Skip the first image -->
                                <div class="slider-item">
                                    <img loading="lazy" style="width: 100%" src="{{ asset('/../images/layanan/' . $img) }}" alt="Foto Layanan {{ $index + 1 }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

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
        .slider-wrapper {
            display: flex;
            overflow-x: auto;
            gap: 10px;
        }
        .slider-item {
            flex: 0 0 auto;
            width: 300px;
        }
    </style>
@endsection
