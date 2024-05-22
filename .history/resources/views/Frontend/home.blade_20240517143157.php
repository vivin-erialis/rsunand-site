@extends('Frontend.layouts.main')
@section('title', 'Website Resmi')
@section('content')
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='/../assets/img/slide-3.jpeg'>">
                <img class="img-fluid" src="/../assets/img/slide-3.jpeg" alt="">
                <div class="owl-carousel-inner home-img ">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 col-lg-12 text-center">
                                <h4 class="display-1 text-white animated slideInDown" style="font-size: 8vw !important">
                                    Rumah Sakit Pendidikan Universitas Andalas</h4>
                                <p class="fs-7 fw-medium text-white mb-4 pb-3" style="font-size: 2vw !important">
                                    "Bekerja dengan Ilmu, Amal, dan Spiritual Demi Kemaslahatan Pasien"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan slide lainnya di sini jika perlu -->
        </div>
    </div>

    <div id="home-content">
        <!-- Konten akan dimuat di sini melalui AJAX -->
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat konten home dengan AJAX
            function loadHomeContent() {
                $.ajax({
                    url: '/ajax-home-content',
                    method: 'GET',
                    success: function(response) {
                        // Bagian Instalasi
                        let bagianInstalasiContent = '';
                        if (response.bagianInstalasi.length === 0) {
                            bagianInstalasiContent = '<h4 class="text-center">Data Belum Tersedia</h4>';
                        } else {
                            bagianInstalasiContent = '<div class="row g-4" style="padding:2vw 4vw">';
                            response.bagianInstalasi.forEach(function(item) {
                                bagianInstalasiContent += `
                                    <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="service-item d-flex position-relative text-center h-100">
                                            <img class="bg-img" src="../images/artikel/${item.gambar}" alt="">
                                            <div class="service-text p-3 card-dokter" style="width: 100%">
                                                <img class="mb-3 mt-2" style="width: 100%" src="../images/artikel/${item.gambar}" alt="Icon">
                                                <h6 class="mb-2">${item.title}</h6>
                                                <p class="mb-2">${item.desc}</p>
                                            </div>
                                        </div>
                                    </div>`;
                            });
                            bagianInstalasiContent += '</div>';
                            bagianInstalasiContent += '<div style="text-align: center;"><a class="btn btn-primary mt-4 py-2 px-4" href="/bagian-instalasi">LIHAT LEBIH BANYAK</a></div>';
                        }

                        // Artikel
                        let artikelContent = '';
                        if (response.artikel.length === 0) {
                            artikelContent = '<h4 class="mt-5 text-center">Belum Ada Artikel</h4>';
                        } else {
                            artikelContent = '<div class="container-berita">';
                            response.artikel.forEach(function(item) {
                                artikelContent += `
                                    <div class="card">
                                        <img loading="lazy" class="card-img" src="../images/artikel/${item.gambar}">
                                        <div class="card-content">
                                            <div class="me-2 mb-3" style="color: #1C7C3D">
                                                <span style="font-size: 12px" class="post-author">
                                                    ${item.kategori.title} | </a>
                                                </span>
                                                <span style="font-size: 12px" class="post-meta-date"><i class="far fa-calendar me-2"></i>${new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
                                            </div>
                                            <a href="/berita/${item.url}">
                                                <h2 class="card-title">${item.title}</h2>
                                            </a>
                                            <p class="card-text">${item.desc}</p>
                                            <a href="/berita/${item.url}" class="card-button">SELENGKAPNYA</a>
                                        </div>
                                    </div>`;
                            });
                            artikelContent += '</div>';
                        }

                        // Menggabungkan semua konten ke dalam div #home-content
                        $('#home-content').html(
                            '<div class="container-xxl py-5">' +
                                '<div class="container">' +
                                    '<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">' +
                                        '<h4 class="section-title">Bagian dan Instalasi</h4>' +
                                        '<h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>' +
                                    '</div>' +
                                    bagianInstalasiContent +
                                '</div>' +
                            '</div>' +
                            '<div class="container-xxl py-5">' +
                                '<div class="container">' +
                                    '<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">' +
                                        '<h4 class="section-title">Berita</h4>' +
                                        '<h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>' +
                                    '</div>' +
                                    artikelContent +
                                '</div>' +
                            '</div>'
                        );
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan saat memuat konten:', error);
                    }
                });
            }

            // Memuat konten saat halaman pertama kali dibuka
            loadHomeContent();
        });
    </script>
@endsection
