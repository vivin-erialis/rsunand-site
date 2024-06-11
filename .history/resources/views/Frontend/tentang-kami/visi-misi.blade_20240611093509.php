@extends('Frontend.layouts.main')
@section('content')
@section('title', 'Visi & Misi')
@include('Frontend.layouts.header')
<div class="container-xxl project py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title"> Visi & Misi</h4>
            <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
        </div>

        <div>
            <div class="col-lg-12">
                <div class="tab-content w-100">

                    {{-- Visi dan Misi --}}
                    <div class="tab-pane fade" style="padding:0px 20px">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100"
                                        src="/../assets/img/about-2.jpeg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: justify">
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

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
