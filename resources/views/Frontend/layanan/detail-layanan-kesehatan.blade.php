@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    @include('Frontend.layanan.header-layanan')
    <div class="">
        <div class="container">
            <div class="">
                <div class="p-2" style="font-size: 15px !important;">
                    @php
                        // Decode the JSON containing the image file names
                        $gambar = json_decode($layanan->gambar);

                        // Split the content into paragraphs
                        $paragraf = explode('</p>', $layanan->desc);

                        // Output the first image as cover at the top
                        if (!empty($gambar)) {
                            echo '<div class="cover-image mb-4">';
                            echo '<img loading="lazy" class="" style="width: 100%" src="' .
                                asset('/../images/layanan/' . $gambar[0]) .
                                '">';
                            echo '</div>';
                        }

                        // Output paragraphs
                        for ($i = 0; $i < count($paragraf); $i++) {
                            echo '<p class="">' . $paragraf[$i] . '</p>';
                        }
                    @endphp

                </div>

                <div class="slider-container">
                    <h4 class="ms-2">Galeri Foto</h4>
                    <div class="slider" id="slider">
                        @foreach ($gambar as $index => $img)
                            @if ($index > 0)
                                <!-- Skip the first image -->
                                <div class="slides mx-2">
                                    <img loading="lazy" style="width: 100%" src="{{ asset('/../images/layanan/' . $img) }}"
                                        alt="Foto Layanan {{ $index + 1 }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="prev" onclick="prevSlide()">&#10094;</button>
                    <button class="next" onclick="nextSlide()">&#10095;</button>
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
