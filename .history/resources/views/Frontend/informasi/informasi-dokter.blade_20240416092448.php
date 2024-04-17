@extends('Frontend.layouts.main')
@section('content')
    @include('Frontend.layouts.header')
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"> DOKTER KAMI</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
               <div class="col">
                <div class="col-lg-3">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-2 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h3 style="font-size: 16px" class="m-0">Dokter Umum</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-2" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h3 style="font-size: 16px" class="m-0">Dokter Gigi & Mulut</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-2" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h3 style="font-size: 16px" class="m-0"> Spesialis Jantung</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-2" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h3 style="font-size: 16px" class="m-0"> Spesialis Bedah</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Syaraf</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Penyakit Dalam</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Paru</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Mata</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis THT</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Mulut</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Kulit & Kelamin</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Kebidanan</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Anak</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Gizi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Psikosomatis</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Psikologi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Rehab Medik</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Radioterapi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Orthopedi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Hemodialisa</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Jiwa</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Onkologi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Digestive</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Plastik</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Thorak, Kardiak dan Vascular (BTKV)</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Syaraf</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Bedah Urologi</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h3 style="font-size: 16px" class="m-0">Spesialis Kedokteran Olahraga/Sport Medicine</h3>
                        </button>
                    </div>
                </div>


               </div>
                <div class="col-lg-9">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <!-- Team Start -->
                            <div class="container-xxl py-5">
                                <div class="container">
                                    <div class="row g-0 team-items">
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-1.jpg" alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg" alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-3.jpg" alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-4.jpg" alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-3.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-4.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-1.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Team End -->
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="container-xxl py-5">
                                <div class="container">
                                    <div class="row g-0 team-items">
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-1.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-3.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-4.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-2.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-3.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-4.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                            <div class="team-item position-relative">
                                                <div class="position-relative">
                                                    <img class="img-fluid" src="/../assets/img/team-1.jpg"
                                                        alt="">
                                                    <div class="team-social text-center">
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-facebook-f"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-twitter"></i></a>
                                                        <a class="btn btn-square" href=""><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                                <div class="bg-light text-center p-4">
                                                    <h3 class="mt-2">Architect Name</h3>
                                                    <span class="text-primary">Designation</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
