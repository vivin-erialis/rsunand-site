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
                        $paragraf = explode('</p>', $layanan->isi);

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
                <div class="slider mt-2 px-5">
                    @if (!empty($gambar))
                        <h3>Foto Lainnya</h3>
                        <div class="slider-wrapper">
                            @foreach ($gambar as $index => $img)
                                @if ($index > 0)
                                    <!-- Skip the first image -->
                                    <div class="slider-item">
                                        <img loading="lazy" style="width: 100%"
                                            src="{{ asset('/../images/layanan/' . $img) }}"
                                            alt="Foto Layanan {{ $index + 1 }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <div class="mt-4">
                        <h2 class=""></h2>
                        <a href="/layanan-unggulan" class="card-button"> <i class="fas fa-arrow-left me-2"></i>Kembali</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tambahkan gaya dan skrip untuk slider -->
        <style>
            /* Styling untuk wrapper slider */
            .slider-wrapper {
                position: relative;
                overflow: hidden;
                width: 100%;
                margin-bottom: 20px;
                /* Ubah sesuai kebutuhan */
            }

            /* Styling untuk daftar gambar slider */
            .slider-wrapper .slider-item {
                display: none;
                width: 100%;
            }

            /* Tampilkan hanya satu gambar sekaligus */
            .slider-wrapper .slider-item:first-child {
                display: block;
            }

            /* Tombol navigasi */
            .slider-wrapper .slider-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 40px;
                height: 40px;
                background-color: rgba(255, 255, 255, 0.5);
                /* Ubah sesuai kebutuhan */
                border-radius: 50%;
                text-align: center;
                line-height: 40px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            /* Navigasi kiri */
            .slider-wrapper .slider-prev {
                left: 10px;
            }

            /* Navigasi kanan */
            .slider-wrapper .slider-next {
                right: 10px;
            }

            /* Hover state untuk tombol navigasi */
            .slider-wrapper .slider-nav:hover {
                background-color: rgba(255, 255, 255, 0.8);
                /* Ubah sesuai kebutuhan */
            }
        </style>

    </div>
@endsection
