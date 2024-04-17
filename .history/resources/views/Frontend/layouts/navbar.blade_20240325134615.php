<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
        <h2 class="text-primary m-0"><img class="me-3" style="width: 50px" src="/../assets/img/rsunandlogo.png" alt="Icon">RSP Universitas Andalas</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link  {{Request::is('/') ? 'active' : ''}}">Beranda</a>
            <a href="/tentang-kami" class="nav-item nav-link  {{Request::is('/tentang-kami') ? 'active' : ''}}">Tentang Kami</a>
            {{-- <a href="service.html" class="nav-item nav-link  {{Request::is('/') ? 'active' : ''}}">Services</a> --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="/jadwal-doker" class="dropdown-item">Jadwal Dokter</a>
                    <a href="/informasi-dokter" class="dropdown-item">Informasi Dokter</a>
                    <a href="/kamar" class="dropdown-item">Ketersediaan Kamar</a>
                    <a href="/bagian-instalasi" class="dropdown-item">Bagian dan Instalasi</a>
                    {{-- <a href="testimonial.html" class="dropdown-item">Testimonial</a> --}}
                    {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Artikel</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="/berita" class="dropdown-item">Berita</a>
                    <a href="/ilmiah" class="dropdown-item">Ilmiah</a>
                    <a href="/pendidikan-pelatihan" class="dropdown-item">Pendidikan dan Pelatihan</a>
                    <a href="/penyakit-pengobatan" class="dropdown-item">Penyakit dan Pengobatan</a>
                    {{-- <a href="testimonial.html" class="dropdown-item">Testimonial</a> --}}
                    {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                </div>
            </div>
            <a href="/kontak" class="nav-item nav-link  {{Request::is('/kontak') ? 'active' : ''}}">KONTAK</a>
        </div>
        <a href="/booking" class="btn btn-primary py-2 px-4 d-none d-lg-block">Booking Online</a>
    </div>
</nav>
