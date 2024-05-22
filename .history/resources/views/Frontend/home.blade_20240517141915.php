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
                        $('#home-content').html(
                            '<div class="container-xxl py-5">' +
                                response.bagianInstalasi +
                            '</div>' +
                            '<div class="container-xxl py-5">' +
                                response.artikel +
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
