<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="/" class="navbar-brand ms-4 ms-lg-0 d-flex mt-1">
        <img class="me-3" style="width: 40px; height: 50px;" src="/../assets/img/rsunandlogo.png" alt="Icon">
        <h3 class="text-primary mt-1 ">Rumah Sakit <br> Univeristas Andalas</h3>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }} ">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                <div class="dropdown-menu border-0 m-0 ">
                    <div class="row mx-2" style="width: 790px">
                        <div class="col-md-4">
                            <strong style="color: #1C7C3D; font-size: 13px">TENTANG KAMI</strong>
                            <hr>
                            <p><a href="/sejarah" class="about-item">Sejarah</a></p>
                            <p> <a href="/visi-misi" class="about-item">Visi & Misi</a> </p>
                            <p><a href="/visi-misi" class="about-item">Milestone</a></p>

                        </div>
                        <div class="col-md-4">
                            <strong style="color: #1C7C3D; font-size: 13px">STRUKTUR KELEMBAGAAN</strong>
                            <hr>
                            <p><a href="/rektor" class="about-item">Rektor</a></p>
                            <p><a href="/dewan-pengawas" class="about-item">Dewan Pengawas</a></p>
                            <p><a href="/direksi" class="about-item">Direksi</a></p>
                            <p><a href="/struktur-organisasi" class="about-item">Struktur Organisasi</a></p>
                        </div>
                        <div class="col-md-4">
                            <strong style="color: #1C7C3D; font-size: 13px">BIDANG</strong>
                            <hr>
                            <p><a href="/pelayanan-medik-keperawatan" class="about-item">Pelayanan Medik dan Keperawatan</a></p>
                            <p><a href="/umum-sumber-daya" class="about-item">Umum dan Sumber Daya</a></p>
                            <p><a href="/keuangan-perencanaan" class="about-item">Keuangan dan Perencanaan</a></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="/layanan-unggulan" class="dropdown-item">Layanan Unggulan</a>
                    <a href="/layanan-rajal" class="dropdown-item">Layanan
                        Rawat Jalan</a>
                    <a href="/layanan-penunjang" class="dropdown-item">Layanan Penunjang</a>
                    <a href="/layanan-lainnya" class="dropdown-item">Layanan Lainnya</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">information</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="/jadwal-doker" class="dropdown-item">Jadwal Dokter</a>
                    <a href="/informasi-dokter" class="dropdown-item">Informasi Dokter</a>
                    <a href="/kamar" class="dropdown-item">Ketersediaan Kamar</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">berita</a>
                <div class="dropdown-menu border-0 m-0">
                    <a href="/berita" class="dropdown-item">Berita</a>
                    <a href="/video" class="dropdown-item">Video</a>
                    <a href="/ilmiah" class="dropdown-item">Ilmiah</a>
                    <a href="/bagian-instalasi" class="dropdown-item">Bagian dan Instalasi</a>
                    <a href="/penyakit-pengobatan" class="dropdown-item">Penyakit dan Pengobatan</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">fasilitas</a>
                <div class="dropdown-menu border-0 m-0">
                    @php
                        use App\Models\Fasilitas;

                        $fasilitas = Fasilitas::all();
                    @endphp
                    @foreach ($fasilitas as $item)
                        @if (is_object($item) && !empty($item->url))
                            <a href="/fasilitas/{{ $item->url }}" class="dropdown-item mt-0">{{ $item->nama }}</a>
                        @endif
                    @endforeach


                </div>
            </div>
            <a href="/upcoming-event"
                class="nav-item nav-link  {{ Request::is('upcoming-event') ? 'active' : '' }}">Upcoming Event</a>
            <a href="/pendidikan-penelitian"
                class="nav-item nav-link  {{ Request::is('pendidikan-penelitian') ? 'active' : '' }}">Pendidikan dan
                Penelitian</a>

            <a href="/kontak" class="nav-item nav-link  {{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
        </div>
    </div>
</nav>
