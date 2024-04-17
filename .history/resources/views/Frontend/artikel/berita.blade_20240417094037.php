@extends('Frontend.layouts.main')
@section('title', 'Berita')
@section('content')
    @include('Frontend.layouts.header')
    {{-- Berita --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Berita</h4>
                <h1 class="display-5 mb-4">Rumah Sakit Pendidikan Universitas Andalas</h1>
            </div>
            <section class="blog-page" id="blog">
                <div class="container mx-auto">
                    <div class="row">
                        <div class="mx-2 col-md-3 container-blog">
                            <div>
                                <img src="/../assets/img/slide-2.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>

                        </div>
                        <div class="mx-2 col-md-3 container-blog">
                            <div>
                                <img src="/../assets/img/slide-2.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>
                        </div>
                        <div class="mx-2 col-md-3 container-blog">
                            <div>
                                <img src="/../assets/img/slide-2.jpg" class="blog-image" alt="">
                            </div>
                            <div class="mx-2">
                                <a href="#">
                                    <h2 class="blog-title">Belajar Matematika</h2>
                                </a>
                            </div>
                            <div class="blog-description mx-2">
                                <p class="date-blog">Januari, 23 2024</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, rem magni? Fugiat
                                    odit,
                                    veniam aliquam ad quae iste aut doloribus.
                                </p>
                            </div>
                            <div class="text-right mb-3 mx-3">
                                <button class="button px-5 py-1">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
