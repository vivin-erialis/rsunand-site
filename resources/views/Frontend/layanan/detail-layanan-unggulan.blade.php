@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
@include('Frontend.layanan.header-layanan')
    <section id="layanan" class="layanan bg-section">
        <div class="container" style="font-size: 15px !important;">
            @php
                // Ambil path gambar dari database
                $gambar = json_decode($layanan->gambar);
                $backgroundImage = asset('/../images/layanan/' . $gambar[0]);
            @endphp
            <div class="background-div" style="background-image: url('{{ $backgroundImage }}'); height: 400px; width: 100%; background-size: cover; background-position: center;">
            </div>
            <!-- <div class="layanan-image">
                <img src="http://localhost:8000/images/layanan/1717992121-2.PNG">
            </div> -->

            <div class="artikel-layanan" style="text-align: justify">
                <h4>Deskripsi</h4>
                <p>Unit perawatan intensif kami didukung oleh dokter spesialis anestesi konsultan intensive care, juga jajaran tim medis berpengalaman dan bersertifikasi dalam menangani pasien kritikal dan memerlukan perawatan intensif. Selain itu, dilengkapi juga dengan perlengkapan medis mutakhir dan modern. Unit perawatan intensif RSUI terdiri dari beberapa unit di bawah ini.
                Universitas Andalas (UNAND) di Padang mencatat tren peningkatan yang stabil dalam output akademiknya. Pada tahun 2013, UNAND menghasilkan 79 publikasi, dan angka ini meningkat setiap tahun. Lonjakan terbesar terjadi pada tahun 2018, di mana jumlah publikasi mencapai 447, meningkat dari 326 publikasi pada tahun sebelumnya. Persentase kenaikan ini mencapai 37,12%. Total publikasi UNAND selama periode 2013-2023 mencapai 5.157 dokumen. Tren ini menunjukkan komitmen UNAND dalam memperkuat kapasitas penelitiannya dan kontribusi akademiknya di berbagai bidang ilmu. Perkembangan tahunan UNAND menunjukkan bahwa investasi dalam penelitian dan kolaborasi dengan berbagai institusi internasional telah membuahkan hasil yang positif. Berdasarkan data QS terakhir, UNAND menduduki peringkat 1401+ dengan output akademik sebesar 4.075 publikasi.
                </p>
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

        img{
            width: 100%;
            height: 350px;
        }
    </style>
@endsection
