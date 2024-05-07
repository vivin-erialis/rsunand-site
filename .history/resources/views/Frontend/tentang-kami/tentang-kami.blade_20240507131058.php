@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Tentang Kami')
@include('Frontend.layouts.header')
<div class="container-xxl project py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title"> TENTANG KAMI</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
        </div>

        <div>
            @include('Frontend.tentang-kami.sidebar')
            <div class="col-lg-12">
                <div class="tab-content w-100">
                    {{-- Sejarah --}}
                    <div class="tab-pane fade show active" style="padding:0px 20px" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-12" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100"
                                        src="/../assets/img/sejarah.png" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <h1 class="mb-4 text-center text-primary mt-4">SEJARAH RUMAH SAKIT UNIVERSITAS
                                        ANDALAS</h1>
                                    <div class="col-md-6" style="text-align: justify">
                                        <p style="font-size: 14px">
                                            Pemberlakuan Universal Health Coverage melalui program Jaminan Kesehatan
                                            Nasional
                                            (JKN) pada
                                            Sistem Jaminan Sosial Nasional menyebabkan terjadinya pembenahan
                                            besar-besaran dalam
                                            sistem
                                            pelayanan kesehatan, seperti fasilitas kesehatan dan mutu tenaga kesehatan.
                                            Di sisi
                                            lain, sistem
                                            pendidikan bidang kesehatan memerlukan rumah sakit sebagai tempat
                                            pendidikan.
                                            Munculnya
                                            paradigma bahwa fungsi pendidikan mengganggu pelayanan di rumah sakit
                                            menyebabkan
                                            pengembangan
                                            kompetensi interprofesionalitas dalam pelayanan dan pendidikan serta
                                            penelitian
                                            translasional
                                            belum berjalan optimal.</p>

                                        <p style="font-size: 14px">
                                            Peraturan Pemerintah nomor 93 tahun 2015 tentang Rumah Sakit Pendidikan
                                            mengatur
                                            bahwa rumah
                                            sakit dapat ditetapkan menjadi Rumah Sakit Pendidikan setelah memenuhi
                                            persyaratan
                                            dan standar
                                            Rumah Sakit Pendidikan. Rumah Sakit Pendidikan merupakan rumah sakit yang
                                            menyelenggarakan
                                            pendidikan, penelitian, dan pelayanan kesehatan secara terpadu dalam bidang
                                            pendidikan profesi
                                            kedokteran dan/atau kedokteran gigi, pendidikan berkelanjutan, dan
                                            pendidikan
                                            tenaga
                                            kesehatan
                                            lainnya. Dalam melaksanakan fungsi ini, sebuah Rumah Sakit Pendidikan harus
                                            mampu
                                            menjalankan
                                            peran menyelenggarakan pelayanan kesehatan yang berkualitas, pendidikan yang
                                            inovatif, dan
                                            pengembangan ilmu pengetahuan dan teknologi. </p>

                                        <p style="font-size: 14px">
                                            Dengan berlakunya Undang-Undang Nomor 20 Tahun 2013 tentang Pendidikan
                                            Kedokteran
                                            yang
                                            menyatakan bahwa pendidikan profesi kedokteran di rumah sakit dilaksanakan
                                            setelah
                                            rumah sakit
                                            ditetapkan menjadi Rumah Sakit Pendidikan, mengisyaratkan bahwa dalam
                                            menjalankan
                                            fungsi
                                            pendidikan, rumah sakit harus dapat menjadi lahan pendidikan yang dapat
                                            meningkatkan
                                            kompetensi
                                            Mahasiswa yang melakukan pendidikan profesi di bidangnya.</p>

                                        <p style="font-size: 14px">
                                            Didukung oleh Kebijakan Dirjen Dikti, pembagunan Fakultas kedokteran di
                                            Kampus
                                            Unand
                                            Limau Manis
                                            telah dilakukan secara bertahap. Untuk menunjang pengembangan kampus yang
                                            efektif
                                            dan efisien
                                            perlu dikembangkan dengan pendekatan University Hospital. Lahirnya
                                            Undang-Undang
                                            Pendidikan
                                            Kedokteran no 20 tahun 2013 mengamanahkan kepada Perguruan tinggi untuk
                                            memiliki
                                            Rumah Sakit
                                            Pendidikan atau memiliki rumah sakit yang bekerja sama dengan Rumah Sakit
                                            Pendidikan
                                            dan sesuai
                                            dengan PP 93/2015 tentang konsep Rumah Sakit Pendididikan. </p>
                                    </div>
                                    <div class="col-md-6" style="text-align: justify">
                                        <p style="font-size: 14px">
                                            Rumah Sakit Unand merupakan Rumah sakit Perguruan tinggi Negeri (RSPTN) yang
                                            berada
                                            dibawah
                                            pengelolaan Universitas Andalas. Rumah sakit yang berada di kompleks kampus
                                            Unand
                                            Limau Manis,
                                            kecamatan Pauh, kota Padang, Sumatera Barat. Rumah sakit ini berdiri di atas
                                            tanah
                                            seluas 3.5 Ha
                                            dengan luas bangunan 21.306 m2 didirikan dengan dana dari Islamic
                                            Development
                                            Bank
                                            (IDB). </p>

                                        <p style="font-size: 14px">
                                            Perencanaan rumah sakit ini telah dimulai sejak tahun 2006 yang berkaitan
                                            dengan
                                            adanya
                                            kebijakan untuk pendirian rumah sakit perguruan tinggi dan terbatasnya
                                            fasilitas
                                            pendidikan di
                                            rumah sakit pendidikan utama di RS. M. Djamil, Padang. Melalui berbagai
                                            proses
                                            dan
                                            tahapan,
                                            peletakan batu pertama rumah sakit dilakukan 29 Maret 2014 oleh Wakil
                                            Menteri
                                            Pendidikan
                                            Nasional, Prof. Dr.Ir. Musliar Kasim, MS yang juga mantan Rektor Universitas
                                            Andalas.</p>

                                        <p style="font-size: 14px">
                                            Rumah sakit ini dibangun dengan 200 tempat tidur serta difasilitasi dengan
                                            sarana
                                            dan prasana
                                            yang cukup lengkap yang telah disesuaikan dengan peraturan
                                            perundang-undangan
                                            yang
                                            berlaku.
                                            Fasilitas yang ada di rumah sakit ini sangat lengkap, dengan program
                                            unggulan
                                            pada
                                            penyakit
                                            keganasan dan gastrointestinal. Pelayanan meliputi pelayanan rawat jalan,
                                            pelayanan
                                            rawat inap,
                                            pelayanan kamar operasi, pelayanan UGD, instalasi farmasi, pelayanan pasien
                                            rujukan,
                                            pelayanan
                                            ICU, ambulance, pelayanan penunjang (radiologi, laboratorium dan gizi) serta
                                            dilengkapi
                                            fasilitas radioterapi yang sangat modern.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Direksi --}}
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="container-xxl py-5">
                            <div class="container">
                                <div class="row g-0 team-items">
                                    @forelse ($direksi as $data)
                                        <div class="col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="../images/direksi/{{ $data->foto }}"
                                                        alt="{{ $data->foto }}">
                                                    {{-- <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div> --}}
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h5 class="mt-2">{{ $data->nama }}</h5>
                                                    <span class="text-primary fs-7">Dokter {{ $data->jabatan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h4 class="text-center"><strong>Data Belum Tersedia</strong></h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Visi dan Misi --}}
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100"
                                        src="/../assets/img/about-2.jpeg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="mb-2">Visi</h1>
                                <p class="mb-4 fs-6"><strong>"Menjadi Rumah Sakit Pendidikan Terkemuka dan Bermartabat
                                        di Indonesia "</strong></p>
                                <h1 class="mb-2 mt-3">Misi</h1>
                                <p><i class="fa fa-check text-primary me-2"></i>Menyelenggarakan pelayanan kesehatan
                                    yang berkualitas dan bermutu berbasis bukti di bidang kesehatan terutama pelayanan
                                    onkologi terpadu dan intensif untuk meningkatkan derajat kesehatan masyarakat.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Menyelenggarakan pendidikan profesi yang
                                    berkualitas, berkarakter, dan berkesinambungan</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Menyelenggarakan penelitian kolaboratif
                                    dan penelitian translasional di bidang profesi kesehatan.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Mengembangkan organisasi dalam
                                    meningkatkan kualitas tata kelola yang unggul (good university hospital governance),
                                    menuju tata kelola yang unggul (excellent university hospital governance), serta
                                    mampu beradaptasi dengan perubahan lingkungan strategis</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Melakukan kegiatan pengabdian masyarakat
                                    dan menjalin jaringan kerjasama yang produktif dan berkelanjutan dengan berbagai
                                    pihak baik di tingkat pemerintah maupun swasta ditingkat daerah, nasional, dan
                                    internasional.</p>
                            </div>
                        </div>
                    </div>
                    {{-- Tujuan --}}
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100"
                                        src="/../assets/img/about-1.jpeg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="mb-3">Tujuan Umum</h1>
                                <p class="mb-4"><strong>Menjadi rumah sakit perguruan tinggi yang mampu memberikan
                                        pelayanan yang berkualitas, profesional dan ilmiah serta menjadi pusat
                                        pendidikan dan penelitian kesehatan yang mampu mendukung sistem
                                        layanan.</strong></p>
                                <h1 class="mb-3">Tujuan Khusus</h1>

                                <p><i class="fa fa-check text-primary me-2"></i>Memberikan pelayanan kesehatan yang
                                    berkualitas, profesional, ilmiah tanpa diskriminasi terhadap semua pasien.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Mengembangkan sistem pelayanan kesehatan
                                    secara terus menerus berbasis Evidence Based Medicine (EBM) sehingga mutu layanan
                                    dapat dipertanggungjawabkan secara ilmiah.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Mengembangkan riset klinis sehingga
                                    mampu menjadi salah satu pusat riset klinis di Indonesia.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Mengembangkan sistem riset produktif
                                    yang dapat menjadi sumber pendapatan rumah sakit sekaligus pusat riset translasional
                                    di Indonesia.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Menjadi pusat pelatihan dan workshop di
                                    bidang kesehatan, khususnya Indonesia bagian Barat.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Mengembangkan sistem pendidikan klinik
                                    yang mampu meningkatkan kompetensi mahasiswa didik.</p>
                                <p><i class="fa fa-check text-primary me-2"></i>Menjadi rumah sakit pendidikan yang
                                    berkontribusi untuk melahirkan sumber daya kesehatan yang handal dan berkualitas.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Motto --}}
                    <div class="tab-pane fade" id="tab-pane-5">
                        <div class="row g-4">
                            <div class="col-md-7" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100"
                                        src="/../assets/img/slide-2.jpg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h1 class="mb-3">Motto</h1>
                                <p class="mb-4 fs-7"><strong>"Bekerja dengan Ilmu, Amal, dan Spiritual Demi
                                        Kemaslahatan
                                        Pasien"</strong></p>
                                <p><i class="fa fa-check text-primary me-2"></i><strong>Ilmu</strong> <br>Mencerminkan
                                    jajaran
                                    RS Universitas Andalas memiliki kecerdasan dan suka berbagi, kreatif dan
                                    inovatif, berjiwa visioner dan belajar sepanjang hayat.</p>
                                <p><i class="fa fa-check text-primary me-2"></i><strong>Amal</strong> <br>Mencerminkan
                                    jajaran
                                    RS Universitas Andalas memiliki kemampuan mandiri, disiplin, kerja keras,
                                    efektif dan efisien.</p>
                                <p><i class="fa fa-check text-primary me-2"></i><strong>Spritual</strong> <br>Merupakan
                                    sumber
                                    inspirasi sekaligus tujuan, dinyatakan dalam ungkapan religius menjadi inti
                                    karakter yang mewarnai keseluruhan karakter, ditujukan dengan sikap dan prilaku
                                    yang dijiwai oleh kepercayaan kepada Tuhan yang Maha Kuasa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
