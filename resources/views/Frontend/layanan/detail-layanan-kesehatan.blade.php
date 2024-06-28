@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    @include('Frontend.layanan.header-layanan')
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-2" style="font-size: 15px !important;">
                    <img  style="width: 100%; height: 100%; object-fit: cover;"
                    src="{{ asset('/../images/layanan/' . $layanan->thumbnail) }}">
                   <p>{!! $layanan->desc !!}</p>

                </div>
                <div class="mt-2 px-2">
                    @php
                        $gambarList = json_decode($layanan->gambar, true);
                    @endphp

                    @if(!empty($gambarList) && is_array($gambarList))
                        <h3>Galeri Foto</h3>
                        <div class="slider-wrapper">
                            @foreach($gambarList as $index => $img)
                                <div class="slider-item">
                                    <img loading="lazy" style="width: 100%" src="{{ asset('images/layanan/' . $img) }}" alt="Foto Layanan {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>


            </div>
        </div>
        <!-- Tambahkan gaya dan skrip untuk slider -->
        <style>
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

    </div>
@endsection
