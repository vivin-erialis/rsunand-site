@extends('Frontend.layouts.main')
@section('title', 'Layanan Rs Unand')
@section('content')
    @include('Frontend.layanan.header-layanan')
    <section id="layanan" class="layanan bg-section">
        <div class="container" style="font-size: 15px !important;">
            @php
                // Ambil path gambar dari database ya
                $gambar = $layanan->thumbnail;
                $backgroundImage = asset('/../images/layanan/' . $gambar);
            @endphp
            <div class="background-div">
            </div>

            <div class="artikel-layanan">
                <p>{!! $layanan->desc !!}</p>
            </div>

            <div class="mt-2">
                @php
                    $gambarList = json_decode($layanan->gambar, true);
                @endphp

                @if (!empty($gambarList) && is_array($gambarList))
                    <h3 class="text-center">Galeri Foto</h3>
                    <div class="slider-wrapper">
                        @foreach ($gambarList as $index => $img)
                            <div class="slider-item">
                                <img loading="lazy" style="width: 100%; height: auto;" src="{{ asset('images/layanan/' . $img) }}"
                                    alt="Foto Layanan {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

    </section>
    <style>
        #layanan {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 73%;
        }

        .background-div {
            background-image: url('{{ $backgroundImage }}');
            height: 400px;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .artikel-layanan {
            text-align: justify;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .slider-wrapper {
            display: flex;
            justify-content: center; /* Menjaga item-item di tengah */
            gap: 10px; /* Jarak antar item */
            flex-wrap: wrap; /* Membungkus item jika melebihi lebar */
            padding: 10px 0;
        }

        .slider-item {
            flex: 0 0 auto; /* Item tidak mengecil/membesar */
            max-width: 300px; /* Lebar maksimal item */
            width: 100%; /* Mengisi lebar yang tersedia */
        }

        .slider-item img {
            display: block;
            width: 100%;
            height: auto; /* Mempertahankan rasio aspek gambar */
            object-fit: cover; /* Mengisi area dengan gambar */
        }

        h3.text-center {
            text-align: center; /* Memusatkan teks heading */
        }

        @media (max-width: 1024px) {
            #layanan {
                width: 85%; /* Lebar yang lebih besar pada perangkat sedang */
            }

            .background-div {
                height: 300px; /* Kurangi tinggi untuk perangkat sedang */
            }
        }

        @media (max-width: 768px) {
            #layanan {
                width: 90%; /* Lebar yang lebih besar pada perangkat tablet */
            }

            .background-div {
                height: 250px; /* Kurangi tinggi untuk tablet */
            }

            .slider-wrapper {
                gap: 8px; /* Kurangi jarak antar item untuk tablet */
            }

            .slider-item {
                max-width: 250px; /* Kurangi lebar maksimal untuk tablet */
            }
        }

        @media (max-width: 600px) {
            #layanan {
                width: 100%; /* Lebar penuh pada perangkat kecil */
            }

            .background-div {
                height: 200px; /* Kurangi tinggi untuk perangkat kecil */
            }

            .slider-wrapper {
                gap: 6px; /* Kurangi jarak antar item untuk perangkat kecil */
            }

            .slider-item {
                max-width: 200px; /* Kurangi lebar maksimal untuk perangkat kecil */
            }

            h3.text-center {
                font-size: 1.2em; /* Kurangi ukuran font untuk heading */
            }
        }

        @media (max-width: 480px) {
            .background-div {
                height: 150px; /* Kurangi tinggi untuk perangkat sangat kecil */
            }

            .slider-wrapper {
                gap: 4px; /* Kurangi jarak antar item untuk perangkat sangat kecil */
            }

            .slider-item {
                max-width: 150px; /* Kurangi lebar maksimal untuk perangkat sangat kecil */
            }

            h3.text-center {
                font-size: 1em; /* Kurangi ukuran font untuk heading */
            }
        }



    </style>
@endsection
