@extends('Frontend.layouts.main')
@section('title', 'Penyakit & Pengobatan')

@section('content')
@include('Frontend.artikel.header-artikel')
<div class="">
    <div class="container">
        <div class="">
            <div class="p-5" style="font-size: 15px !important;">
                @php
                    // Decode the JSON containing the image file names
                    $gambar = json_decode($penyakitPengobatan->gambar);

                    // Split the content into paragraphs
                    $paragraf = explode("</p>", $penyakitPengobatan->isi);

                    // Output the first image as cover at the top
                    if (!empty($gambar)) {
                        echo '<div class="cover-image mb-4">';
                        echo '<img loading="lazy" class="" style="width: 100%" src="' . asset('/../images/artikel/' . $gambar[0]) . '">';
                        echo '</div>';
                    }

                    // Output paragraphs
                    for ($i = 0; $i < count($paragraf); $i++) {
                        echo '<p class="">' . $paragraf[$i] . '</p>';
                    }
                @endphp

            </div>
            <div class="slider mt-2 px-5">
                @if(!empty($gambar))
                    <h3>Foto Dokumentasi</h3>
                    <div class="slider-wrapper">
                        @foreach($gambar as $index => $img)
                            @if($index > 0) <!-- Skip the first image -->
                                <div class="slider-item">
                                    <img loading="lazy" style="width: 100%" src="{{ asset('/../images/artikel/' . $img) }}" alt="Foto Layanan {{ $index + 1 }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="mt-4">
                    <h2 class=""></h2>
                    <a href="/penyakit-pengobatan" class="card-button"> <i class="fas fa-arrow-left me-2"></i>Kembali</a>
                </div>
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
