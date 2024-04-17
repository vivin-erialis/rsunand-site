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
                @include('Frontend.informasi.sidebar')
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
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="/../assets/img/project-3.jpg" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                                        diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                                        duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="/../assets/img/project-4.jpg" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                                        diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                                        duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-5">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="/../assets/img/project-4.jpg" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                                        diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                                        duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
