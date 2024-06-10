@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
@include('Frontend.layanan.header-layanan')
    {{-- Berita --}}
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-5" style="font-size: 15px !important;">
                    @php
                        // Decode the JSON containing the image file names
                        $gambar = json_decode($layanan->gambar);

                        // Split the content into paragraphs
                        $paragraf = explode("</p>", $layanan->isi);

                        // Output the first image as cover at the top
                        if (!empty($gambar)) {
                            echo '<div class="cover-image mb-4">';
                            echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/layanan/' . $gambar[0]) . '">';
                            echo '</div>';
                        }

                        // Output paragraphs
                        for ($i = 0; $i < count($paragraf); $i++) {
                            echo '<p class="">' . $paragraf[$i] . '</p>';
                        }
                    @endphp
                    <div class="mt-4">
                        <h2 class=""></h2>
                        <a href="/layanan-unggulan" class="card-button">Kembali</a>
                    </div>
                </div>
                <div class="slider mt-5">
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
                width: 200px;
            }
        </style>

    </div>
@endsection
